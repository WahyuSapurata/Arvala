<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Kategori;
use App\Models\Product;
use App\Models\DiskonProduk;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProductController extends BaseController
{
    public function index()
    {
        $module = 'Product';
        return view('admin.product.index', compact('module'));
    }

    public function get()
    {
        $data = Product::all();
        $data->map(function ($item) {
            $kategori = Kategori::where('uuid', $item->uuid_kategori)->first();
            $item->nama_kategori = $kategori->nama_kategori;
            return $item;
        });
        return $this->sendResponse($data, 'Get data success');
    }

    public function add()
    {
        $module = 'Tambah Product';
        return view('admin.product.tambah', compact('module'));
    }

    public function store(StoreProductRequest $storeProductRequest)
    {
        $newThumbnail = '';
        $imageDetails = [];

        if ($storeProductRequest->file('thumbnail')) {
            $extension = $storeProductRequest->file('thumbnail')->extension();
            $newThumbnail = 'thumbnail-' . now()->timestamp . '.' . $extension;
            $storeProductRequest->file('thumbnail')->storeAs('public/product-thumbnail', $newThumbnail);
        }

        if ($storeProductRequest->hasFile('image_product')) {
            foreach ($storeProductRequest->file('image_product') as $index => $image) {
                $extension = $image->extension();
                $filename = 'detail-' . $index . '-' . now()->timestamp . '.' . $extension;
                $image->storeAs('public/product-detail', $filename);
                $imageDetails[] = $filename;
            }
        }

        $price = $storeProductRequest->price;
        $kategori = Kategori::where('uuid', $storeProductRequest->uuid_kategori)->first();
        if ($kategori && strtolower($kategori->nama_kategori) === 'free') {
            $price = 0;
        }

        try {
            $data = new Product();
            $data->uuid_kategori = $storeProductRequest->uuid_kategori;
            $data->judul_product = $storeProductRequest->judul_product;
            $data->slug = Str::slug($storeProductRequest->judul_product);
            $data->thumbnail = $newThumbnail;
            $data->price = $price;
            $data->deskripsi = $storeProductRequest->deskripsi;
            $data->image_product = json_encode($imageDetails);
            $data->meta = $storeProductRequest->meta;
            $data->link = $storeProductRequest->link;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }

        return $this->sendResponse($data, 'Add product success');
    }

    public function edit($params)
    {
        $module = 'Edit Product';
        $data = Product::where('uuid', $params)->first();
        return view('admin.product.edit', compact('module', 'data'));
    }

    public function update(UpdateProductRequest $updateProductRequest, $params)
    {
        $product = Product::where('uuid', $params)->first();

        if ($updateProductRequest->hasFile('thumbnail')) {
            $oldThumbnailPath = public_path('public/product-thumbnail/' . $product->thumbnail);
            if (File::exists($oldThumbnailPath)) {
                File::delete($oldThumbnailPath);
            }
            $thumbnailFile = $updateProductRequest->file('thumbnail');
            $thumbnail = 'thumbnail-' . now()->timestamp . '.' . $thumbnailFile->extension();
            $thumbnailFile->storeAs('public/product-thumbnail', $thumbnail);
        } else {
            $thumbnail = $product->thumbnail;
        }

        $deletedImages = $updateProductRequest->deleted_images ?? [];
        $orderedExistingImages = $updateProductRequest->ordered_existing_images ?? [];
        $newlyUploadedFilenames = [];

        foreach ($deletedImages as $imgToDelete) {
            $oldPath = public_path('public/product-detail/' . $imgToDelete);
            if (File::exists($oldPath)) {
                File::delete($oldPath);
            }
        }

        if ($updateProductRequest->hasFile('image_product')) {
            foreach ($updateProductRequest->file('image_product') as $index => $file) {
                $filename = 'image_' . $index . '-' . now()->timestamp . '.' . $file->extension();
                $file->storeAs('public/product-detail', $filename);
                $newlyUploadedFilenames[] = $filename;
            }
        }

        $finalImageArray = array_merge($orderedExistingImages, $newlyUploadedFilenames);

        try {
            $product->uuid_kategori = $updateProductRequest->uuid_kategori;
            $product->judul_product = $updateProductRequest->judul_product;
            $product->slug = Str::slug($updateProductRequest->judul_product);
            $product->thumbnail = $thumbnail;
            $product->price = $updateProductRequest->price;
            $product->deskripsi = $updateProductRequest->deskripsi;
            $product->image_product = json_encode($finalImageArray);
            $product->meta = $updateProductRequest->meta;
            $product->link = $updateProductRequest->link;
            $product->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }

        return $this->sendResponse($product, 'Update product success');
    }

    public function delete($params)
    {
        try {
            $product = Product::where('uuid', $params)->firstOrFail();
            DiskonProduk::where('uuid_produk', $product->uuid)->delete();

            $thumbnailPath = public_path('public/product-thumbnail/' . $product->thumbnail);
            if (File::exists($thumbnailPath)) {
                File::delete($thumbnailPath);
            }

            $imageProductArray = json_decode($product->image_product, true);
            if (is_array($imageProductArray)) {
                foreach ($imageProductArray as $imageFilename) {
                    $imagePath = public_path('public/product-detail/' . $imageFilename);
                    if (File::exists($imagePath)) {
                        File::delete($imagePath);
                    }
                }
            }
            $product->delete();
            return $this->sendResponse($product, 'Delete product success');
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
    }
}

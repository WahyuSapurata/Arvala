<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Kategori;
use App\Models\Product;
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
        $newDetail1 = '';
        $newDetail2 = '';
        $newDetail3 = '';
        $newDetail4 = '';
        if ($storeProductRequest->file('thumbnail')) {
            $extension = $storeProductRequest->file('thumbnail')->extension();
            $newThumbnail = 'thumbnail' . '-' . now()->timestamp . '.' . $extension;
            $storeProductRequest->file('thumbnail')->storeAs('public/product-thumbnail', $newThumbnail);
        }

        if ($storeProductRequest->file('detail_1')) {
            $extension = $storeProductRequest->file('detail_1')->extension();
            $newDetail1 = 'detail_1' . '-' . now()->timestamp . '.' . $extension;
            $storeProductRequest->file('detail_1')->storeAs('public/product-detail_1', $newDetail1);
        }

        if ($storeProductRequest->file('detail_2')) {
            $extension = $storeProductRequest->file('detail_2')->extension();
            $newDetail2 = 'detail_2' . '-' . now()->timestamp . '.' . $extension;
            $storeProductRequest->file('detail_2')->storeAs('public/product-detail_2', $newDetail2);
        }

        if ($storeProductRequest->file('detail_3')) {
            $extension = $storeProductRequest->file('detail_3')->extension();
            $newDetail3 = 'detail_3' . '-' . now()->timestamp . '.' . $extension;
            $storeProductRequest->file('detail_3')->storeAs('public/product-detail_3', $newDetail3);
        }

        if ($storeProductRequest->file('detail_4')) {
            $extension = $storeProductRequest->file('detail_4')->extension();
            $newDetail4 = 'detail_4' . '-' . now()->timestamp . '.' . $extension;
            $storeProductRequest->file('detail_4')->storeAs('public/product-detail_4', $newDetail4);
        }

        try {
            $data = new Product();
            $data->uuid_kategori = $storeProductRequest->uuid_kategori;
            $data->judul_product = $storeProductRequest->judul_product;
            $data->slug = Str::slug($storeProductRequest->judul_product);
            $data->thumbnail = $newThumbnail;
            $data->price = $storeProductRequest->price;
            $data->deskripsi = $storeProductRequest->deskripsi;
            $data->detail_1 = $newDetail1;
            $data->detail_2 = $newDetail2;
            $data->detail_3 = $newDetail3;
            $data->detail_4 = $newDetail4;
            $data->meta = $storeProductRequest->meta;
            $data->link = $storeProductRequest->link;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Add event success');
    }

    public function edit($params)
    {
        $module = 'Edit Product';
        $data = Product::where('uuid', $params)->first();
        return view('admin.product.edit', compact('module', 'data'));
    }

    public function update(UpdateProductRequest $updateProductRequest, $params)
    {
        $data = Product::where('uuid', $params)->first();

        $oldThumbnail = public_path('/public/product-thumbnail/' . $data->thumbnail);
        $oldDetail1 = public_path('/public/product-detail_1/' . $data->detail_1);
        $oldDetail2 = public_path('/public/product-detail_2/' . $data->detail_2);
        $oldDetail3 = public_path('/public/product-detail_3/' . $data->detail_3);
        $oldDetail4 = public_path('/public/product-detail_4/' . $data->detail_4);

        $newThumbnail = '';
        $newDetail1 = '';
        $newDetail2 = '';
        $newDetail3 = '';
        $newDetail4 = '';
        if ($updateProductRequest->file('thumbnail')) {
            $extension = $updateProductRequest->file('thumbnail')->extension();
            $newThumbnail = 'thumbnail' . '-' . now()->timestamp . '.' . $extension;
            $updateProductRequest->file('thumbnail')->storeAs('public/product-thumbnail', $newThumbnail);

            if (File::exists($oldThumbnail)) {
                File::delete($oldThumbnail);
            }
        }

        if ($updateProductRequest->file('detail_1')) {
            $extension = $updateProductRequest->file('detail_1')->extension();
            $newDetail1 = 'detail_1' . '-' . now()->timestamp . '.' . $extension;
            $updateProductRequest->file('detail_1')->storeAs('public/product-detail_1', $newDetail1);


            if (File::exists($oldDetail1)) {
                File::delete($oldDetail1);
            }
        }

        if ($updateProductRequest->file('detail_2')) {
            $extension = $updateProductRequest->file('detail_2')->extension();
            $newDetail2 = 'detail_2' . '-' . now()->timestamp . '.' . $extension;
            $updateProductRequest->file('detail_2')->storeAs('public/product-detail_2', $newDetail2);

            if (File::exists($oldDetail2)) {
                File::delete($oldDetail2);
            }
        }

        if ($updateProductRequest->file('detail_3')) {
            $extension = $updateProductRequest->file('detail_3')->extension();
            $newDetail3 = 'detail_3' . '-' . now()->timestamp . '.' . $extension;
            $updateProductRequest->file('detail_3')->storeAs('public/product-detail_3', $newDetail3);

            if (File::exists($oldDetail3)) {
                File::delete($oldDetail3);
            }
        }

        if ($updateProductRequest->file('detail_4')) {
            $extension = $updateProductRequest->file('detail_4')->extension();
            $newDetail4 = 'detail_4' . '-' . now()->timestamp . '.' . $extension;
            $updateProductRequest->file('detail_4')->storeAs('public/product-detail_4', $newDetail4);

            if (File::exists($oldDetail4)) {
                File::delete($oldDetail4);
            }
        }

        try {
            $data->uuid_kategori = $updateProductRequest->uuid_kategori;
            $data->judul_product = $updateProductRequest->judul_product;
            $data->slug = Str::slug($updateProductRequest->judul_product);
            $data->thumbnail = $updateProductRequest->file('thumbnail') ? $newThumbnail : $data->thumbnail;
            $data->price = $updateProductRequest->price;
            $data->deskripsi = $updateProductRequest->deskripsi;
            $data->detail_1 = $updateProductRequest->file('detail_1') ? $newDetail1 : $data->detail_1;
            $data->detail_2 = $updateProductRequest->file('detail_2') ? $newDetail2 : $data->detail_2;
            $data->detail_3 = $updateProductRequest->file('detail_3') ? $newDetail3 : $data->detail_3;
            $data->detail_4 = $updateProductRequest->file('detail_4') ? $newDetail4 : $data->detail_4;
            $data->meta = $updateProductRequest->meta;
            $data->link = $updateProductRequest->link;
            $data->save();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Update event success');
    }

    public function delete($params)
    {
        $data = array();
        try {
            $data = Product::where('uuid', $params)->first();
            // Simpan nama foto lama untuk dihapus
            $oldThumbnail = public_path('/public/product-thumbnail/' . $data->thumbnail);
            $oldDetail1 = public_path('/public/product-detail_1/' . $data->detail_1);
            $oldDetail2 = public_path('/public/product-detail_2/' . $data->detail_2);
            $oldDetail3 = public_path('/public/product-detail_3/' . $data->detail_3);
            $oldDetail4 = public_path('/public/product-detail_4/' . $data->detail_4);
            // Hapus foto lama jika ada
            if (File::exists($oldThumbnail)) {
                File::delete($oldThumbnail);
            }
            if (File::exists($oldDetail1)) {
                File::delete($oldDetail1);
            }
            if (File::exists($oldDetail2)) {
                File::delete($oldDetail2);
            }
            if (File::exists($oldDetail3)) {
                File::delete($oldDetail3);
            }
            if (File::exists($oldDetail4)) {
                File::delete($oldDetail4);
            }
            $data->delete();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), $e->getMessage(), 400);
        }
        return $this->sendResponse($data, 'Delete Event success');
    }
}

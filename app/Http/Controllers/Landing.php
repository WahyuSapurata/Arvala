<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Product;
use Illuminate\Http\Request;

class Landing extends BaseController
{
    public function home()
    {
        $module = 'Home';
        $latest_product = Product::latest()
            ->take(10) // ambil lebih banyak dulu agar tidak terlalu cepat habis setelah filter
            ->get()
            ->filter(function ($product) {
                $kategori = Kategori::where('uuid', $product->uuid_kategori)->first();
                return $kategori && strtolower($kategori->nama_kategori) !== 'bundle';
            })
            ->take(6) // ambil hanya 6 setelah difilter
            ->map(function ($product) {
                $kategori = Kategori::where('uuid', $product->uuid_kategori)->first();
                $product->kategori = $kategori ? $kategori->nama_kategori : '-';
                return $product;
            });
        $bundle_product = Product::latest()
            ->take(6)
            ->get()
            ->map(function ($latest) {
                $data = Kategori::where('uuid', $latest->uuid_kategori)->first();
                $latest->kategori = $data->nama_kategori;
                return $latest;
            });
        $bundle_product = $bundle_product->filter(function ($item) {
            return strtolower($item->kategori) == 'bundle';
        });
        $more_product = Product::take(10)
            ->get()
            ->filter(function ($product) {
                $kategori = Kategori::where('uuid', $product->uuid_kategori)->first();
                return $kategori && strtolower($kategori->nama_kategori) !== 'bundle';
            })
            ->take(6)
            ->map(function ($product) {
                $kategori = Kategori::where('uuid', $product->uuid_kategori)->first();
                $product->kategori = $kategori ? $kategori->nama_kategori : '-';
                return $product;
            });
        return view('landing.home.index', compact('module', 'latest_product', 'bundle_product', 'more_product'));
    }

    public function detail_product($params)
    {
        $data = Product::where('slug', $params)->first();
        $module = $data->judul_product;
        return view('landing.detailproduct.index', compact('data', 'module'));
    }

    public function shop(Request $request)
    {
        $module = 'Shop';
        $data_kategori = Kategori::all();

        // Query untuk produk dengan pencarian
        $product = Product::when($request->search, function ($query) use ($request) {
            $query->where('meta', 'like', '%' . $request->search . '%');
        })
            ->join('kategoris', 'products.uuid_kategori', '=', 'kategoris.uuid')
            ->select('products.*', 'kategoris.nama_kategori as kategori')
            ->paginate(6);

        return view('landing.shop.index', compact('module', 'data_kategori', 'product'));
    }

    public function about()
    {
        $module = 'About';
        return view('landing.about.index', compact('module'));
    }

    public function faqs()
    {
        $module = 'FAQs';
        return view('landing.faqs.index', compact('module'));
    }
}

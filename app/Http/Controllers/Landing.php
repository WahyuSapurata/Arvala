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
            ->take(6)
            ->get()
            ->map(function ($latest) {
                $data = Kategori::where('uuid', $latest->uuid_kategori)->first();
                $latest->kategori = $data->nama_kategori;
                return $latest;
            });
        $more_product = Product::take(6)
            ->get()
            ->map(function ($more) {
                $data = Kategori::where('uuid', $more->uuid_kategori)->first();
                $more->kategori = $data->nama_kategori;
                return $more;
            });
        return view('landing.home.index', compact('module', 'latest_product', 'more_product'));
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
            ->paginate(6);

        return view('landing.shop.index', compact('module', 'data_kategori', 'product'));
    }

    public function about()
    {
        $module = 'About';
        return view('landing.about.index', compact('module'));
    }

    public function contact()
    {
        $module = 'Contact';
        return view('landing.contact.index', compact('module'));
    }
}

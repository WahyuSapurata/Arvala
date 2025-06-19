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

        // Produk dengan kategori "bundle"
        $bundle_product = Product::latest()
            ->get()
            ->filter(function ($product) {
                $kategori = Kategori::where('uuid', $product->uuid_kategori)->first();
                return $kategori && strtolower($kategori->nama_kategori) === 'bundle';
            })
            ->take(6)
            ->map(function ($product) {
                $kategori = Kategori::where('uuid', $product->uuid_kategori)->first();
                $product->kategori = $kategori ? $kategori->nama_kategori : '-';
                return $product;
            });

        // Produk dengan kategori "free"
        $free_product = Product::latest()
            ->get()
            ->filter(function ($product) {
                $kategori = Kategori::where('uuid', $product->uuid_kategori)->first();
                return $kategori && strtolower($kategori->nama_kategori) === 'free';
            })
            ->take(6)
            ->map(function ($product) {
                $kategori = Kategori::where('uuid', $product->uuid_kategori)->first();
                $product->kategori = $kategori ? $kategori->nama_kategori : '-';
                return $product;
            });

        // Produk lainnya, bukan kategori "bundle"
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

        return view('landing.home.index', compact('module', 'free_product', 'bundle_product', 'more_product'));
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
        // Mengambil semua data kategori dan mengurutkannya
        $data_kategori = Kategori::all()->sortBy(function ($kategori) {
            // Memberikan prioritas untuk Bundle dan Free
            if ($kategori->nama_kategori === 'Bundle') {
                return '1_Bundle'; // Akan muncul pertama
            } elseif ($kategori->nama_kategori === 'Free') {
                return '2_Free'; // Akan muncul kedua
            } else {
                return '3_' . $kategori->nama_kategori; // Sisanya diurutkan alfabetis
            }
        });

        // Produk untuk tab "All"
        $product = Product::when($request->search, function ($query) use ($request) {
            $query->where('meta', 'like', '%' . $request->search . '%');
        })
            ->join('kategoris', 'products.uuid_kategori', '=', 'kategoris.uuid')
            ->select('products.*', 'kategoris.nama_kategori as kategori')
            ->paginate(6);

        // Ambil semua produk dan kelompokkan berdasarkan kategori
        $productByCategory = Product::join('kategoris', 'products.uuid_kategori', '=', 'kategoris.uuid')
            ->select('products.*', 'kategoris.nama_kategori')
            ->get()
            ->groupBy('uuid_kategori');

        return view('landing.shop.index', compact('module', 'data_kategori', 'product', 'productByCategory'));
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

    public function lisensi()
    {
        $module = 'Lisensi';
        return view('landing.lisensi.index', compact('module'));
    }
}

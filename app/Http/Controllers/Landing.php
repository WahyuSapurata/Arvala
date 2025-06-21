<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Product;
use App\Models\DiskonProduk;
use Illuminate\Http\Request;

class Landing extends BaseController
{
    public function home()
    {
        $module = 'Home';

        // Ambil semua produk + relasi diskon
        $all_products = Product::with('diskon')->latest()->get();

        // Ambil semua kategori sekali saja (untuk efisiensi)
        $kategoriMap = Kategori::all()->keyBy('uuid');

        // Fungsi bantu: membersihkan string harga seperti "$7.00"
        $sanitizePrice = function ($value) {
            return (float) str_replace(['$', ',', ' '], '', $value);
        };

        // Fungsi bantu untuk memproses produk
        $processProduct = function ($product) use ($kategoriMap, $sanitizePrice) {
            // Ambil nama kategori dari map
            $kategori = $kategoriMap->get($product->uuid_kategori);
            $product->kategori = $kategori ? $kategori->nama_kategori : '-';

            // Konversi harga
            $product->original_price = $sanitizePrice($product->price);

            // Cek dan hitung diskon
            if ($product->diskon && $product->diskon->akhir_tanggal->isFuture()) {
                $diskon = $sanitizePrice($product->diskon->diskon_persen);
                $product->discount_percentage = $diskon;
                $product->final_price = $product->original_price - ($product->original_price * $diskon / 100);
            } else {
                $product->discount_percentage = 0;
                $product->final_price = $product->original_price;
            }

            return $product;
        };

        // Produk kategori "bundle"
        $bundle_product = $all_products
            ->filter(function ($product) use ($kategoriMap) {
                $kategori = $kategoriMap->get($product->uuid_kategori);
                return $kategori && strtolower($kategori->nama_kategori) === 'bundle';
            })
            ->take(6)
            ->map($processProduct);

        // Produk kategori "free"
        $free_product = $all_products
            ->filter(function ($product) use ($kategoriMap) {
                $kategori = $kategoriMap->get($product->uuid_kategori);
                return $kategori && strtolower($kategori->nama_kategori) === 'free';
            })
            ->take(6)
            ->map($processProduct);

        // Produk kategori lainnya (selain bundle)
        $more_product = $all_products
            ->filter(function ($product) use ($kategoriMap) {
                $kategori = $kategoriMap->get($product->uuid_kategori);
                return $kategori && strtolower($kategori->nama_kategori) !== 'bundle';
            })
            ->take(6)
            ->map($processProduct);

        return view('landing.home.index', compact(
            'module',
            'bundle_product',
            'free_product',
            'more_product'
        ));
    }

    public function detail_product($params)
    {
        $data = Product::with('diskon')->where('slug', $params)->firstOrFail();
        $module = $data->judul_product;

        // Bersihkan format harga dari database
        $data->original_price = (float) str_replace(['$', ','], '', $data->price);

        // Hitung harga diskon jika ada
        if ($data->diskon && $data->diskon->akhir_tanggal->isFuture()) {
            $data->discount_percentage = (float) $data->diskon->diskon_persen;
            $data->final_price = $data->original_price - ($data->original_price * $data->discount_percentage / 100);
            $data->has_discount = true;
        } else {
            $data->final_price = $data->original_price;
            $data->has_discount = false;
        }

        // Get 2 free products (excluding the current product)
        $free_products = Product::whereHas('kategori', function($query) {
            $query->where('nama_kategori', 'Free');
        })->where('id', '!=', $data->id)
        ->take(2)
        ->get();

        return view('landing.detailproduct.index', compact('data', 'module', 'free_products'));
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

        // Produk untuk tab "All" dengan relasi diskon
        $product = Product::with('diskon')
            ->when($request->search, function ($query) use ($request) {
                $query->where('meta', 'like', '%' . $request->search . '%');
            })
            ->join('kategoris', 'products.uuid_kategori', '=', 'kategoris.uuid')
            ->select('products.*', 'kategoris.nama_kategori as kategori')
            ->paginate(6);

        // Proses perhitungan harga untuk setiap produk
        $product->getCollection()->transform(function ($item) {
            // Bersihkan format harga dari "$7.00" menjadi float
            $item->original_price = (float) str_replace(['$', ','], '', $item->price);

            // Hitung harga diskon jika ada diskon aktif
            if ($item->diskon && $item->diskon->akhir_tanggal->isFuture()) {
                $item->discount_percentage = (float) $item->diskon->diskon_persen;
                $item->final_price = $item->original_price - ($item->original_price * $item->discount_percentage / 100);
            } else {
                $item->final_price = $item->original_price;
                $item->discount_percentage = 0;
            }

            return $item;
        });

        // Ambil semua produk dan kelompokkan berdasarkan kategori (dengan perhitungan harga)
        $productByCategory = Product::with('diskon')
            ->join('kategoris', 'products.uuid_kategori', '=', 'kategoris.uuid')
            ->select('products.*', 'kategoris.nama_kategori')
            ->get()
            ->map(function ($item) {
                // Proses yang sama untuk productByCategory
                $item->original_price = (float) str_replace(['$', ','], '', $item->price);

                if ($item->diskon && $item->diskon->akhir_tanggal->isFuture()) {
                    $item->discount_percentage = (float) $item->diskon->diskon_persen;
                    $item->final_price = $item->original_price - ($item->original_price * $item->discount_percentage / 100);
                } else {
                    $item->final_price = $item->original_price;
                    $item->discount_percentage = 0;
                }

                return $item;
            })
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

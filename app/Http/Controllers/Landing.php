<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Product;
use App\Models\DiskonProduk;
use Illuminate\Http\Request;
use Carbon\Carbon;

class Landing extends BaseController
{
    public function home()
    {
        // Menambahkan logika penghapusan diskon kedaluwarsa di halaman utama
        DiskonProduk::where('akhir_tanggal', '<', Carbon::now('Asia/Jakarta'))->delete();

        $module = 'Home';
        $all_products = Product::with('diskon')->latest()->get();
        $kategoriMap = Kategori::all()->keyBy('uuid');

        $sanitizePrice = function ($value) {
            return (float) str_replace(['$', ',', ' '], '', $value);
        };

        $processProduct = function ($product) use ($kategoriMap, $sanitizePrice) {
            $kategori = $kategoriMap->get($product->uuid_kategori);
            $product->kategori = $kategori ? $kategori->nama_kategori : '-';
            $product->original_price = $sanitizePrice($product->price);

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

        $bundle_product = $all_products
            ->filter(function ($product) use ($kategoriMap) {
                $kategori = $kategoriMap->get($product->uuid_kategori);
                return $kategori && strtolower($kategori->nama_kategori) === 'bundle';
            })
            ->take(6)
            ->map($processProduct);

        $free_product = $all_products
            ->filter(function ($product) use ($kategoriMap) {
                $kategori = $kategoriMap->get($product->uuid_kategori);
                return $kategori && strtolower($kategori->nama_kategori) === 'free';
            })
            ->take(6)
            ->map($processProduct);

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
        // Hapus diskon yang sudah kedaluwarsa
        DiskonProduk::where('akhir_tanggal', '<', Carbon::now('Asia/Jakarta'))->delete();

        // Ambil produk beserta relasi kategori & diskon
        $data = Product::with(['diskon', 'kategori'])->where('slug', $params)->firstOrFail();
        $module = $data->judul_product;

        // Hitung harga asli
        $data->original_price = (float) str_replace(['$', ','], '', $data->price);

        // Hitung diskon jika masih berlaku
        if ($data->diskon && $data->diskon->akhir_tanggal->isFuture()) {
            $data->discount_percentage = (float) $data->diskon->diskon_persen;
            $data->final_price = $data->original_price - ($data->original_price * $data->discount_percentage / 100);
            $data->has_discount = true;
        } else {
            $data->final_price = $data->original_price;
            $data->has_discount = false;
        }

        // Ambil produk gratis lain untuk rekomendasi
        $free_products = Product::whereHas('kategori', function($query) {
            $query->where('nama_kategori', 'Free');
        })
        ->where('id', '!=', $data->id)
        ->take(2)
        ->get();

        return view('landing.detailproduct.index', compact('data', 'module', 'free_products'));
    }

    public function shop(Request $request)
    {
        // Logika penghapusan sudah ada di sini
        DiskonProduk::where('akhir_tanggal', '<', Carbon::now('Asia/Jakarta'))->delete();

        $module = 'Shop';
        $data_kategori = Kategori::all()->sortBy(function ($kategori) {
            if ($kategori->nama_kategori === 'Bundle') return '1_Bundle';
            if ($kategori->nama_kategori === 'Free') return '2_Free';
            return '3_' . $kategori->nama_kategori;
        });

        $bundleCategory = $data_kategori->firstWhere('nama_kategori', 'Bundle');
        $freeCategory = $data_kategori->firstWhere('nama_kategori', 'Free');
        $dropdownCategories = $data_kategori->whereNotIn('nama_kategori', ['Bundle', 'Free']);

        $active_tab_id = 'all';
        $categoryNameFromUrl = $request->input('nama_kategori');
        if ($categoryNameFromUrl) {
            $selectedCategory = $data_kategori->firstWhere('nama_kategori', $categoryNameFromUrl);
            if ($selectedCategory) {
                $active_tab_id = $selectedCategory->uuid;
            }
        }

        $isDropdownActive = $dropdownCategories->contains('uuid', $active_tab_id);

        $product = Product::with('diskon')
            ->when($request->search, fn($q) => $q->where('meta', 'like', '%' . $request->search . '%'))
            ->join('kategoris', 'products.uuid_kategori', '=', 'kategoris.uuid')
            ->select('products.*', 'kategoris.nama_kategori as kategori')
            ->paginate(6);

        $product->getCollection()->transform(function ($item) {
            $item->original_price = (float) str_replace(['$', ','], '', $item->price);

            if ($item->diskon && $item->diskon->akhir_tanggal->isFuture()) {
                $item->discount_percentage = (float) $item->diskon->diskon_persen;
                $item->final_price = $item->original_price - ($item->original_price * $item->discount_percentage / 100);
            } else {
                $item->final_price = $item->original_price;
                $item->discount_percentage = 0;
            }
            return $item;
        });

        $productByCategory = Product::with('diskon')
            ->join('kategoris', 'products.uuid_kategori', '=', 'kategoris.uuid')
            ->select('products.*', 'kategoris.nama_kategori')
            ->get()
            ->map(function ($item) {
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

        return view('landing.shop.index', compact(
            'module',
            'data_kategori',
            'product',
            'productByCategory',
            'active_tab_id',
            'bundleCategory',
            'freeCategory',
            'dropdownCategories',
            'isDropdownActive'
        ));
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

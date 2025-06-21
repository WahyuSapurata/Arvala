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

        $all_products = Product::latest()->get();
        $kategoriMap = Kategori::all()->keyBy('uuid');

        $sanitizePrice = function ($value) {
            return (float) str_replace(['$', ',', ' '], '', $value);
        };

        $processProduct = function ($product) use ($kategoriMap, $sanitizePrice) {
            $kategori = $kategoriMap->get($product->uuid_kategori);
            $product->kategori = $kategori ? $kategori->nama_kategori : '-';
            $product->original_price = $sanitizePrice($product->price);
            $product->discount_percentage = 0;
            $product->final_price = $product->original_price;
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
        $data = Product::where('slug', $params)->firstOrFail();
        $module = $data->judul_product;

        $data->original_price = (float) str_replace(['$', ','], '', $data->price);
        $data->final_price = $data->original_price;
        $data->has_discount = false;

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

        // 1. Mengambil dan mengurutkan kategori (Logika ini tetap sama)
        $data_kategori = Kategori::all()->sortBy(function ($kategori) {
            if ($kategori->nama_kategori === 'Bundle') return '1_Bundle';
            if ($kategori->nama_kategori === 'Free') return '2_Free';
            return '3_' . $kategori->nama_kategori;
        });

        // Memecah kategori untuk tampilan navigasi baru (Logika ini tetap sama)
        $bundleCategory = $data_kategori->firstWhere('nama_kategori', 'Bundle');
        $freeCategory = $data_kategori->firstWhere('nama_kategori', 'Free');
        $otherCategories = $data_kategori->whereNotIn('nama_kategori', ['Bundle', 'Free']);
        $firstAlphabeticalCategory = $otherCategories->first();
        $dropdownCategories = $otherCategories->skip(1);

        // 2. Tentukan tab aktif berdasarkan parameter URL (Logika ini tetap sama)
        $active_tab_id = 'all';
        $categoryNameFromUrl = $request->input('nama_kategori');
        if ($categoryNameFromUrl) {
            $selectedCategory = $data_kategori->firstWhere('nama_kategori', $categoryNameFromUrl);
            if ($selectedCategory) {
                $active_tab_id = $selectedCategory->uuid;
            }
        }

        // Cek apakah tab aktif ada di dropdown (Logika ini tetap sama)
        $isDropdownActive = $dropdownCategories->contains('uuid', $active_tab_id);

        // === PERUBAHAN UTAMA: MENGHAPUS LOGIKA DISKON DARI QUERY PRODUK ===

        // 3. Mengambil produk untuk tab "All" (paginasi) tanpa memanggil relasi 'diskon'
        $product = Product::query() // Menggunakan query() untuk memulai, with('diskon') dihapus
            ->when($request->search, fn($q) => $q->where('meta', 'like', '%' . $request->search . '%'))
            ->join('kategoris', 'products.uuid_kategori', '=', 'kategoris.uuid')
            ->select('products.*', 'kategoris.nama_kategori as kategori')
            ->paginate(6);

        // Menyiapkan data harga tanpa kalkulasi diskon
        $product->getCollection()->transform(function ($item) {
            $original_price = (float) str_replace(['$', ','], '', $item->price);
            $item->original_price = $original_price;
            $item->final_price = $original_price; // Harga final sekarang sama dengan harga asli
            $item->discount_percentage = 0; // Set diskon ke 0
            return $item;
        });

        // Mengambil semua produk dan mengelompokkannya berdasarkan kategori, tanpa relasi 'diskon'
        $productByCategory = Product::query() // with('diskon') dihapus
            ->join('kategoris', 'products.uuid_kategori', '=', 'kategoris.uuid')
            ->select('products.*', 'kategoris.nama_kategori')
            ->get()
            ->map(function ($item) {
                // Menyiapkan data harga tanpa kalkulasi diskon
                $original_price = (float) str_replace(['$', ','], '', $item->price);
                $item->original_price = $original_price;
                $item->final_price = $original_price; // Harga final sekarang sama dengan harga asli
                $item->discount_percentage = 0; // Set diskon ke 0
                return $item;
            })
            ->groupBy('uuid_kategori');

        // 4. Kirim semua variabel ke view (Logika ini tetap sama)
        return view('landing.shop.index', compact(
            'module',
            'data_kategori',
            'product',
            'productByCategory',
            'active_tab_id',
            'bundleCategory',
            'freeCategory',
            'firstAlphabeticalCategory',
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

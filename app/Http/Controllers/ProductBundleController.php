<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\BundleItem;

class ProductBundleController extends Controller
{
    public function getBundle($uuid)
    {
        // Ambil semua produk kategori FREE, paling baru di atas
        $allFreeProducts = Product::whereHas('kategori', function($q){
                $q->where('nama_kategori', 'free');
            })
            ->orderBy('created_at', 'desc') // ini yang memastikan terbaru di atas
            ->get(['uuid', 'judul_product']);

        // Produk yang sudah termasuk dalam bundle ini
        $selectedProducts = BundleItem::where('uuid_bundle_product', $uuid)
            ->pluck('uuid_included_product')
            ->toArray();

        return response()->json([
            'all_free_products' => $allFreeProducts,
            'selected_products' => $selectedProducts,
        ]);
    }

    public function storeBundle(Request $request)
    {
        $request->validate([
            'bundle_uuid' => 'required|uuid',
            'included_products' => 'nullable|array|max:2',
            'included_products.*' => 'uuid',
        ], [
            'included_products.max' => 'Maksimal hanya boleh 2 produk free.',
        ]);

        // Hapus relasi lama
        BundleItem::where('uuid_bundle_product', $request->bundle_uuid)->delete();

        // Simpan relasi baru jika ada
        if ($request->included_products) {
            foreach ($request->included_products as $uuid) {
                BundleItem::create([
                    'uuid_bundle_product' => $request->bundle_uuid,
                    'uuid_included_product' => $uuid,
                ]);
            }
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Produk free bundle berhasil diperbarui.',
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\BundleItem;
use Exception;
use Illuminate\Support\Facades\Log;

class ProductBundleController extends Controller
{
    public function getBundle($uuid)
    {
        try {
            // Log untuk debugging
            Log::info("ProductBundleController::getBundle called with UUID: " . $uuid);

            // Validasi UUID terlebih dahulu
            if (!$uuid || !preg_match('/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/i', $uuid)) {
                Log::error("Invalid UUID format: " . $uuid);
                return response()->json([
                    'status' => 'error',
                    'message' => 'Format UUID tidak valid'
                ], 400);
            }

            // Cek apakah produk utama ada
            $mainProduct = Product::where('uuid', $uuid)->first();
            if (!$mainProduct) {
                Log::error("Product not found with UUID: " . $uuid);
                return response()->json([
                    'status' => 'error',
                    'message' => 'Produk tidak ditemukan'
                ], 404);
            }

            Log::info("Main product found: " . $mainProduct->judul_product);

            // Ambil semua produk kategori FREE, paling baru di atas
            $allFreeProducts = Product::whereHas('kategori', function($q){
                    $q->where('nama_kategori', 'free');
                })
                ->orderBy('created_at', 'desc')
                ->get(['uuid', 'judul_product']);

            Log::info("Free products count: " . $allFreeProducts->count());

            // Jika tidak ada produk free, beri pesan yang jelas
            if ($allFreeProducts->isEmpty()) {
                Log::warning("No free products found");
                return response()->json([
                    'status' => 'warning',
                    'message' => 'Tidak ada produk free yang tersedia',
                    'all_free_products' => [],
                    'selected_products' => []
                ]);
            }

            // Produk yang sudah termasuk dalam bundle ini
            $selectedProducts = BundleItem::where('uuid_bundle_product', $uuid)
                ->pluck('uuid_included_product')
                ->toArray();

            Log::info("Selected products count: " . count($selectedProducts));

            return response()->json([
                'status' => 'success',
                'all_free_products' => $allFreeProducts,
                'selected_products' => $selectedProducts,
            ]);

        } catch (Exception $e) {
            Log::error("Error in getBundle: " . $e->getMessage());
            Log::error("Stack trace: " . $e->getTraceAsString());

            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function storeBundle(Request $request)
    {
        try {
            Log::info("ProductBundleController::storeBundle called");
            Log::info("Request data: " . json_encode($request->all()));

            $request->validate([
                'bundle_uuid' => 'required|uuid',
                'included_products' => 'nullable|array|max:2',
                'included_products.*' => 'uuid',
            ], [
                'included_products.max' => 'Maksimal hanya boleh 2 produk free.',
            ]);

            // Cek apakah produk utama ada
            $mainProduct = Product::where('uuid', $request->bundle_uuid)->first();
            if (!$mainProduct) {
                Log::error("Main product not found: " . $request->bundle_uuid);
                return response()->json([
                    'status' => 'error',
                    'message' => 'Produk utama tidak ditemukan'
                ], 404);
            }

            // Hapus relasi lama
            $deletedCount = BundleItem::where('uuid_bundle_product', $request->bundle_uuid)->delete();
            Log::info("Deleted old bundle items: " . $deletedCount);

            // Simpan relasi baru jika ada
            if ($request->included_products) {
                foreach ($request->included_products as $uuid) {
                    // Validasi bahwa produk yang diinclude ada
                    $includedProduct = Product::where('uuid', $uuid)->first();
                    if (!$includedProduct) {
                        Log::error("Included product not found: " . $uuid);
                        return response()->json([
                            'status' => 'error',
                            'message' => 'Produk yang dipilih tidak ditemukan: ' . $uuid
                        ], 404);
                    }

                    BundleItem::create([
                        'uuid_bundle_product' => $request->bundle_uuid,
                        'uuid_included_product' => $uuid,
                    ]);
                }
                Log::info("Created new bundle items: " . count($request->included_products));
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Produk free bundle berhasil diperbarui.',
            ]);

        } catch (Exception $e) {
            Log::error("Error in storeBundle: " . $e->getMessage());
            Log::error("Stack trace: " . $e->getTraceAsString());

            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
}

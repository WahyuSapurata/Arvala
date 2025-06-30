<?php

namespace App\Http\Controllers;

use App\Models\DiskonProduk;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DiskonProdukController extends Controller
{
    // ... (method index dan checkProductDiscount tidak perlu diubah) ...
    public function index()
    {
        try {
            $diskons = DiskonProduk::with('product')->orderByDesc('created_at')->get();
            return response()->json(['success' => true, 'data' => $diskons]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal mengambil data diskon'], 500);
        }
    }

    public function checkProductDiscount($productUuid)
    {
        try {
            $diskon = DiskonProduk::where('uuid_produk', $productUuid)
                                  ->where('akhir_tanggal', '>', now())
                                  ->first();
            return response()->json([
                'has_discount' => $diskon ? true : false,
                'discount_data' => $diskon ? [
                    'uuid' => $diskon->uuid,
                    'diskon_persen' => $diskon->diskon_persen,
                    'akhir_tanggal' => $diskon->akhir_tanggal->format('Y-m-d\TH:i'),
                ] : null
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal mengecek diskon produk'], 500);
        }
    }


    public function store(Request $request)
    {
        try {
            // PERUBAHAN 1: Validasi 'after' sekarang spesifik ke zona waktu Jakarta
            $validated = $request->validate([
                'product_uuid' => 'required|exists:products,uuid',
                'diskon_persen' => 'required|numeric|min:1|max:100',
                'akhir_tanggal' => ['required', 'date', 'after:' . now('Asia/Jakarta')],
            ]);

            $existingDiscount = DiskonProduk::where('uuid_produk', $request->product_uuid)
                                            ->where('akhir_tanggal', '>', now())
                                            ->first();

            if ($existingDiscount) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Produk ini sudah memiliki diskon aktif.'
                ], 422);
            }

            // PERUBAHAN 2: Saat menyimpan, beri tahu Carbon bahwa ini adalah waktu Jakarta
            DiskonProduk::create([
                'uuid' => (string) Str::uuid(),
                'uuid_produk' => $request->product_uuid,
                'diskon_persen' => $request->diskon_persen,
                'akhir_tanggal' => Carbon::createFromFormat('Y-m-d\TH:i', $request->akhir_tanggal, 'Asia/Jakarta'),
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Diskon berhasil ditambahkan'
            ]);

        } catch (\Exception $e) {
            \Log::error('Error creating discount: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal menambahkan diskon: ' . $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $uuid)
    {
        try {
            // PERUBAHAN 3: Validasi 'after' juga diubah di sini
            $validated = $request->validate([
                'diskon_persen' => 'required|numeric|min:1|max:100',
                'akhir_tanggal' => ['required', 'date', 'after:' . now('Asia/Jakarta')],
            ]);

            $diskon = DiskonProduk::where('uuid', $uuid)->first();
            if (!$diskon) {
                return response()->json(['status' => 'error', 'message' => 'Diskon tidak ditemukan'], 404);
            }

            // PERUBAHAN 4: Saat update, beri tahu Carbon bahwa ini adalah waktu Jakarta
            $diskon->update([
                'diskon_persen' => $request->diskon_persen,
                'akhir_tanggal' => Carbon::createFromFormat('Y-m-d\TH:i', $request->akhir_tanggal, 'Asia/Jakarta')
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Diskon berhasil diupdate'
            ]);

        } catch (\Exception $e) {
            \Log::error('Error updating discount: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal mengupdate diskon: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($uuid)
    {
        try {
            $diskon = DiskonProduk::where('uuid', $uuid)->first();
            if (!$diskon) return response()->json(['success' => false, 'message' => 'Diskon tidak ditemukan'], 404);

            $diskon->delete();
            return response()->json(['success' => true, 'message' => 'Diskon berhasil dihapus']);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menghapus diskon: ' . $e->getMessage()], 500);
        }
    }
}

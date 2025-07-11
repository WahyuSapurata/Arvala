<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BundleItem extends Model
{
    use HasFactory;

    protected $table = 'product_bundle_items';

    protected $fillable = [
        'uuid_bundle_product',
        'uuid_included_product',
    ];

    /**
     * Relasi ke produk bundle.
     * Contoh penggunaan:
     * $bundleItem->bundleProduct
     */
    public function bundleProduct()
    {
        return $this->belongsTo(Product::class, 'uuid_bundle_product', 'uuid');
    }

    /**
     * Relasi ke produk yang termasuk dalam bundle.
     * Contoh penggunaan:
     * $bundleItem->includedProduct
     */
    public function includedProduct()
    {
        return $this->belongsTo(Product::class, 'uuid_included_product', 'uuid');
    }
}

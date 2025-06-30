<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DiskonProduk extends Model
{
    use HasFactory;

    protected $table = 'diskon_produks';
    protected $primaryKey = 'id';
    protected $fillable = [
        'uuid',
        'uuid_produk',
        'diskon_persen',
        'akhir_tanggal'
    ];

    protected $casts = [
        'akhir_tanggal' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        // Event listener untuk membuat UUID sebelum menyimpan
        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }

    /**
     * Relasi ke model Product
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'uuid_produk', 'uuid');
    }
}

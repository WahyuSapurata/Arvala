<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'uuid',
        'uuid_kategori',
        'judul_product',
        'slug',
        'thumbnail',
        'price',
        'deskripsi',
        'image_product',
        'meta',
        'link',
    ];

    protected static function boot()
    {
        parent::boot();

        // Event listener untuk membuat UUID sebelum menyimpan
        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'uuid_kategori', 'uuid');
    }
}

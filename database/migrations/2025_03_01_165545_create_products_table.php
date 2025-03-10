<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->uuid('uuid_kategori');
            $table->string('judul_product');
            $table->string('slug');
            $table->string('thumbnail');
            $table->string('price');
            $table->text('deskripsi');
            $table->string('detail_1');
            $table->string('detail_2');
            $table->string('detail_3');
            $table->string('detail_4')->nullable();
            $table->string('meta');
            $table->string('link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

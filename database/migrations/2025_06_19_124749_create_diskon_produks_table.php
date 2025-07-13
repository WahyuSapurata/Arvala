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
        Schema::create('diskon_produks', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->uuid('uuid_produk'); // Kolom ini akan menjadi kunci relasi
            $table->unsignedTinyInteger('diskon_persen')->nullable();
            $table->dateTime('akhir_tanggal');
            $table->timestamps();
            $table->index('uuid_produk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diskon_produks');
    }
};

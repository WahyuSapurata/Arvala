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
            $table->uuid('uuid_produk');
            $table->unsignedTinyInteger('diskon_persen')->nullable();
            $table->dateTime('akhir_tanggal');
            $table->timestamps();

            // Pastikan index ada sebelum foreign key
            $table->index('uuid_produk');

            // Tambahkan foreign key constraint
            $table->foreign('uuid_produk')
                  ->references('uuid')
                  ->on('products')
                  ->onDelete('cascade');
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

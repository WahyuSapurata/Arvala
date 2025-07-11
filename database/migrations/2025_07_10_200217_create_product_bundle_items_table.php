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
        Schema::create('product_bundle_items', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_bundle_product');     // UUID produk bundle
            $table->uuid('uuid_included_product');   // UUID produk yang termasuk
            $table->timestamps();

            // Index untuk performa query
            $table->index('uuid_bundle_product');
            $table->index('uuid_included_product');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_bundle_items');
    }
};

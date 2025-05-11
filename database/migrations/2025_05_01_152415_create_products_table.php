<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('nama');
                $table->string('deskripsi');
                $table->decimal('harga', 10, 2);
                $table->unsignedBigInteger('stok_id');
                $table->string('status');
                $table->decimal('rating', 3, 1)->nullable();
                $table->timestamps();
            });
        }

        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->longBlob('image_product')->nullable(false);
            $table->boolean('is_main')->default(true);
            $table->timestamps();
            });
        }

    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('products_images');
    }
};

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
        Schema::create('cart', function (Blueprint $table) {
            $table->id('cart_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('produk_id');
            $table->string('nama_produk');
            $table->decimal('harga', 10, 2);
            $table->integer('quantity');
            $table->string('gambar_produk');
            $table->boolean('hidden')->default(false); // Tambahkan field hidden
            $table->timestamps();
        
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('produk_id')->references('produk_id')->on('produk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart');
    }
};
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
        Schema::create('produk', function (Blueprint $table) {
            $table->id('produk_id');
            $table->unsignedBigInteger('id_user'); // Menambahkan kolom id_user
            $table->string('nama_produk');
            $table->decimal('harga', 10, 2);
            $table->integer('stok');
            $table->string('gambar_produk')->nullable();
            $table->string('deskripsi');
            $table->timestamps();
            $table->boolean('is_hidden')->default(false);
            $table->unsignedBigInteger('kategori_id');
            
            
            // Mendefinisikan foreign key
            $table->foreign('kategori_id')->references('kategori_id')->on('kategori')->onDelete('cascade');
            $table->foreign('id_user')->references('user_id')->on('users')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};

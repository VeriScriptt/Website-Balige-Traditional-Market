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
    Schema::create('ulasan', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('produk_id');
        $table->unsignedBigInteger('user_id');
        $table->text('comment');
        $table->string('name');
        $table->string('nama_produk');
        $table->boolean('hidden')->default(false);
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
        Schema::dropIfExists('ulasan');
    }
    
};
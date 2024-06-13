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
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role',['admin','penjual','pembeli'])->default('pembeli');
            $table->string('gambar_toko')->nullable();
            $table->string('nama_toko')->nullable();
            $table->string('nik')->nullable();
            $table->date('tanggal_lahir')->nullable(); // Menambahkan field tanggal lahir
            $table->integer('nomor_toko')->nullable();
            $table->enum('lantai_toko',['Lantai 1','Lantai 2','Balairung'])->default('Lantai 1')->nullable();
            $table->string('nomor_telepon')->nullable();
            $table->boolean('active')->default(true); // Add this line to create the active column
            $table->boolean('verified')->default(false); // Add this line to create the verified column
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
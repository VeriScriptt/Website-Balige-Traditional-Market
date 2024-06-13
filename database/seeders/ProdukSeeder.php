<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;
use Illuminate\Support\Str;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Nama file gambar
        $images = [
            '1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg',
            '6.jpg', '7.jpg', '8.jpg', '9.jpg', '10.jpg',
            '11.jpg', '12.jpg', '13.jpg', '14.jpg', '15.jpg',
            '16.jpg', '17.jpg', '18.jpg', '19.jpg', '20.jpg'
        ];
        // Membuat 20 data produk acak
        for ($i = 0; $i < 20; $i++) {
            Produk::create([
                'id_user' => 2, // Asumsikan ada 10 user
                'nama_produk' => 'Produk ' . Str::random(5),
                'harga' => rand(10000, 1000000), // Harga antara 10,000 sampai 1,000,000
                'stok' => rand(1, 100), // Stok antara 1 sampai 100
                'gambar_produk' => $images[$i], // Nama file gambar
                'deskripsi' => 'Deskripsi untuk Produk ' . Str::random(10),
                'is_hidden' => 0, // 0 atau 1
                'kategori_id' => rand(1, 2), // 0 atau 1
            ]);
        }
    }
}

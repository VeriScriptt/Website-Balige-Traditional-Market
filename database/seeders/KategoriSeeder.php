<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;
use Illuminate\Support\Str;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $images=[
            '1716526385.jpg','1716526614.jpg','1716532367.jpg','1716532381.jpg','1716532408.jpg','1716532436.jpeg'
        ];

        // Membuat 5 data kategori
        for ($i = 1; $i <= 5; $i++) {
            Kategori::create([
                'nama_kategori' => 'Kategori ' . $i,
                'foto' => $images[$i],
            ]);
        }
    }
}

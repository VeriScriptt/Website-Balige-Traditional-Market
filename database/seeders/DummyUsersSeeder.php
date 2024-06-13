<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_data =[
            [
                'name' => 'Mas Veri admin',
                'email'=> 'admin@gmail.com',
                'role' => 'admin',
                'password'  => bcrypt('12345')
            ],

            [
                'name' => 'Mas Veri penjual',
                'email'=> 'penjual@gmail.com',
                'role' => 'penjual',
                'password'  => bcrypt('12345'),
                'gambar_toko' =>'1716521575.jpeg',
                'nik' => 125712792300,
                'nomor_toko' => '324', 
                'lantai_toko'=>'Lantai 1',
                'nomor_telepon' => '621370349867',


            ],

            [
                'name' => 'Mas Veri pembeli',
                'email'=> 'pembeli@gmail.com',
                'role' => 'pembeli',
                'password'  => bcrypt('12345')
            ],
        ];    
        foreach($user_data as $key => $val){

            User::create($val);
        }
    }
}

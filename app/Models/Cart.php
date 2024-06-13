<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



Class cart extends Model
{
    use HasFactory;

    protected $table = 'cart';
    protected $primaryKey = 'cart_id';
    protected $fillable = [
        'user_id',
        'produk_id',
        'nama_produk',
        'harga',
        'quantity',
        'gambar_produk',
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $primaryKey = 'produk_id';
    protected $fillable = ['id_user', 'nama_produk', 'harga', 'stok', 'gambar_produk', 'deskripsi', 'is_hidden'];
    public $timestamps = true;

    /**
     * Relasi ke model User.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'user_id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'kategori_id');
    }

    // Produk Model
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'produk_id', 'produk_id');
    }
}

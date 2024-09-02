<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'order_id';

    protected $fillable = [
        'user_id', 'total_price', 'status'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function setBuktiTransaksiForStore($storeId, $filename)
    {
        $buktiTransaksi = json_decode($this->bukti_transaksi, true) ?? [];
        $buktiTransaksi[$storeId] = $filename;
        $this->bukti_transaksi = json_encode($buktiTransaksi);
        $this->save();
    }

    public function getBuktiTransaksiForStore($storeId)
    {
        $buktiTransaksi = json_decode($this->bukti_transaksi, true) ?? [];
        return $buktiTransaksi[$storeId] ?? null;
    }
    



    


}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



Class Caraousel extends Model
{
    use HasFactory;

    protected $table = 'caraousel';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'title',
        'deskripsi',
        'gambar_caraousel',
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}
}
<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $products = Produk::paginate(12);
        return view('layouts.shop', compact('products'));
    }

    public function shop(Request $request)
    {
        $query = Produk::query();

        $sortBy = $request->input('sortBy', 'relevance');
        switch ($sortBy) {
            case 'nameAsc':
                $query->orderBy('nama_produk', 'asc');
                break;
            case 'nameDesc':
                $query->orderBy('nama_produk', 'desc');
                break;
            case 'priceAsc':
                $query->orderBy('harga', 'asc');
                break;
            case 'priceDesc':
                $query->orderBy('harga', 'desc');
                break;
            default:
                // Pengurutan berdasarkan relevansi (tanpa pengurutan)
                break;
        }

        $products = $query->paginate(12);
        return view('layouts.shop', compact('products'));
    }
    
}
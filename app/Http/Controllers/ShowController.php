<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Produk;

use App\Models\Ulasan;
use App\Models\Kategori;
use App\Models\Caraousel;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    // public function index(): View
    // {
    //     //get produks
    //     $produk = Produk::all();

    //     //render view with posts
    //     return view('layouts.index', compact('produk'));
    //     // return view('layouts.index')->with('produk', $produk);

    // }

    public function index(): View
    {
        // Mengambil semua kategori
        $kategori = Kategori::all();
        $carousel = Caraousel::all();
        // Mengambil semua produk
        $produk = Produk::all();
        // Mengambil semua users
        $users = User::where('role', 'penjual')->get();
    
        // Mengirimkan data produk, kategori, carousel, dan users ke view
        return view('layouts.index', compact('produk', 'kategori', 'carousel', 'users'));
    }
    


    public function showDetail($id)
    {
        $produk = Produk::findOrFail($id);
        $otherProducts = Produk::where('produk_id', '!=', $id)->where('is_hidden', false)->get();
        
        // Ambil data penjual
        $penjual = User::findOrFail($produk->id_user);
        $ulasan = Ulasan::where('produk_id', $id)
                        ->where('hidden', false)
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('Layouts.shop_detail', compact('produk', 'otherProducts', 'penjual','ulasan'));
    }
    
    public function showToko($id)
    {
        $penjual = User::findOrFail($id);
        $produks = Produk::where('id_user', $id)->where('is_hidden', false)->get();

        return view('layouts.toko', compact('penjual', 'produks'));
    }

    // public function show()
    // {
    //     $kategori = Kategori::all();
    //     return view('layouts.index', compact('kategori'));
    // }
    // public function search(Request $request)
    // {
    //     $query = $request->input('query');
    
    //     // Perform the search query using your model (e.g., Produk)
    //     $results = Produk::where('nama_produk', 'like', '%' . $query . '%')
    //                     ->where('is_hidden', false) // Optionally, apply any additional conditions
    //                     ->get();
    
    //     // Render the search results as HTML markup
    //     $html = '';
    //     if ($results->count() > 0) {
    //         foreach ($results as $result) {
    //             // Customize the HTML markup for each search result as needed
    //             $html .= '<div class="product">';
    //             $html .= '<h4>' . $result->nama_produk . '</h4>';
    //             // Add more details if needed
    //             $html .= '</div>';
    //         }
    //     } else {
    //         $html = '<div class="no-results">No results found.</div>';
    //     }
    
    //     return $html;
    // }

    // app/Http/Controllers/ProductController.php
    public function liveSearch(Request $request)
    {
        $query = $request->input('query');
        if ($query) {
            $products = Produk::where('nama_produk', 'like', "%$query%")->get();
        } else {
            $products = [];
        }
    
        $output = '';
        if ($products->count() > 0) {
            foreach ($products as $product) {
                $output .= '<div class="product-result" data-query="' . $product->nama_produk . '">';
                $output .= '<h3>' . $product->nama_produk . '</h3>';
                // $output .= '<img src="' . asset('images/produk/' . $product->gambar_produk) . '" alt="' . $product->nama_produk . '">';
                $output .= '</div>';
            }
        } else {
            $output = '<div class="no-results">No results found.</div>';
        }
    
        return response()->json($output);
    }
    


    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Produk::where('nama_produk', 'like', '%' . $query . '%')->limit(5)->get();
        $stores = User::where('nama_toko', 'like', '%' . $query . '%')->where('role', 'penjual')->limit(5)->get(); // Hanya ambil penjual

        // Menggabungkan hasil pencarian produk dan toko
        $results = [
            'products' => $products,
            'stores' => $stores
        ];

        return response()->json($results);
    }


    public function searchResults(Request $request)
    {
        $query = $request->input('query');
        $products = Produk::where('nama_produk', 'like', '%' . $query . '%')->paginate(12);
        $stores = User::where('nama_toko', 'like', '%' . $query . '%')->paginate(12);

        return view('search_results', compact('products', 'stores'  , 'query'));
    }

    

    
    

}

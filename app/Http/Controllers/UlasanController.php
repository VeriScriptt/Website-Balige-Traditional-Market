<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UlasanController extends Controller
{

    //Ulasan
public function indexUlasan($produk_id)
{
    $ulasan = Ulasan::all();

    return view('layouts.shop_detail', compact('ulasan'));
}

public function storeUlasan(Request $request)
{
    $validatedData = $request->validate([
        'produk_id' => 'required|exists:produk,produk_id',
        'user_id' => 'required|exists:users,user_id',
        'name' => 'required|string',
        'comment' => 'required|string',
    ]);

    $produk = Produk::findOrFail($validatedData['produk_id']);
    $validatedData['nama_produk'] = $produk->nama_produk;

    $ulasan = Ulasan::create($validatedData);

    return redirect()->back()->with('success', 'Ulasan berhasil ditambahkan.');
}

    public function index()
    {
        $ulasan = Ulasan::with('produk')->get();
        return view('admin.ulasanAdmin', compact('ulasan'));
    }

    public function hide($id)
    {
        $ulasan = Ulasan::findOrFail($id);
        $ulasan->hidden = true;
        $ulasan->save();

        return redirect()->route('ulasan.admin')->with('success', 'Ulasan berhasil disembunyikan.');
    }

    public function unhide($id)
    {
        $ulasan = Ulasan::findOrFail($id);
        $ulasan->hidden = false;
        $ulasan->save();

        return redirect()->route('ulasan.admin')->with('success', 'Ulasan berhasil ditampilkan.');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class PenjualUlasanController extends Controller
{
    public function index()
    {
        $userId = Auth::id(); // Mengambil ID pengguna yang sedang login
        Log::info('User ID: ' . $userId);

        $ulasan = Ulasan::whereHas('produk', function($query) use ($userId) {
            $query->where('id_user', $userId);
        })->get();

        Log::info('Ulasan: ' . $ulasan);

        return view('penjual.ulasan', compact('ulasan'));
    }

    public function hide($id)
    {
        $ulasan = Ulasan::findOrFail($id);
        $ulasan->hidden = true;
        $ulasan->save();

        return redirect()->route('penjual.ulasan')->with('success', 'Ulasan berhasil disembunyikan.');
    }

    public function unhide($id)
    {
        $ulasan = Ulasan::findOrFail($id);
        $ulasan->hidden = false;
        $ulasan->save();

        return redirect()->route('penjual.ulasan')->with('success', 'Ulasan berhasil ditampilkan.');
    }
}

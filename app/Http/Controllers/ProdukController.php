<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    public function edit($id)
    {
        $kategori = Kategori::all();
        $produk = Produk::findOrFail($id);
        return view('layoutspenjual.edit_produk' , compact('produk','kategori'));
    }   
    
    public function create()
    {
        // echo "Create method called"; // Debug statement
        $kategori = Kategori::all();
        return view('Layoutspenjual.tambah_produk', compact('kategori'));
    }
    
    
    
    

    // public function create()
    // {
    //     return view('Layouts.create_produk');
    // }


    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_produk' => 'required',
            'gambar_produk' => 'required|image|max:5120', // maksimal 5MB
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'required',
            'kategori_id' => 'required|exists:kategori,kategori_id' // Add validation for kategori_id existence
        ]);
    
        // Simpan gambar produk
        if ($request->hasFile('gambar_produk')) {
            $image = $request->file('gambar_produk');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/produk'), $imageName);
        } else {
            return redirect()->back()->withErrors(['error' => 'Gambar produk diperlukan.']);
        }
    
        // Simpan data produk
        $produk = new Produk();
        $produk->id_user = Auth::id(); // Mengambil id user dari user yang sedang login
        $produk->nama_produk = $validatedData['nama_produk'];
        $produk->harga = $validatedData['harga'];
        $produk->stok = $validatedData['stok'];
        $produk->deskripsi = $validatedData['deskripsi'];
        $produk->kategori_id = $validatedData['kategori_id']; // Assign kategori_id
        $produk->gambar_produk = $imageName;
    
        // Try saving the product
        try {
            $produk->save();
        } catch (\Exception $e) {
            // Handle any database errors
            return redirect()->back()->withInput()->withErrors(['error' => 'Failed to save product. Please try again.']);
        }
    
        return redirect()->route('penjual.produk')->with('success', 'Produk berhasil ditambahkan.');
    }
    
    
    
        

// public function update(Request $request, $id)
// {
//     // Lakukan validasi input
//     $validatedData = $request->validate([
//         'editNamaProduk' => 'required',
//         'editHarga' => 'required|numeric|min:0',
//         'editStok' => 'required|numeric|min:0',
//         'editGambarProduk' => 'nullable|file|max:5120', // 5MB
//         'editDeskripsi' => 'required',
//     ]);

//     // Dapatkan produk yang akan diupdate
//     $produk = Produk::findOrFail($id);

//     // Update data produk
//     $produk->nama_produk = $request->editNamaProduk;
//     $produk->harga = $request->editHarga;
//     $produk->stok = $request->editStok;
//     $produk->deskripsi = $request->editDeskripsi;

//     // Proses upload gambar produk jika ada
//     if ($request->hasFile('editGambarProduk')) {
//         // Hapus gambar lama jika ada
//         if ($produk->gambar_produk) {
//             $oldGambarPath = public_path('images/produk/' . $produk->gambar_produk);
//             if (file_exists($oldGambarPath)) {
//                 unlink($oldGambarPath);
//             }
//         }

//         $gambar = $request->file('editGambarProduk');
//         $namaGambar = time() . '.' . $gambar->getClientOriginalExtension();
//         $gambar->move(public_path('images/produk'), $namaGambar);
//         $produk->gambar_produk = $namaGambar;
//     }

//     // Simpan perubahan
//     $produk->save();

//     // Redirect atau berikan respon yang sesuai
//     return redirect()->route('penjual.produk')->with('success', 'Produk berhasil diperbarui.');
// }

public function update(Request $request, $id)
{
    // Lakukan validasi input
    $validatedData = $request->validate([
        'editNamaProduk' => 'required',
        'editHarga' => 'required|numeric|min:0',
        'editStok' => 'required|numeric|min:0',
        'editGambarProduk' => 'nullable|file|max:5120', // 5MB
        'editDeskripsi' => 'required',
        'editKategori' => 'required|exists:kategori,kategori_id', // Validasi kategori
    ]);

    // Dapatkan produk yang akan diupdate
    $produk = Produk::findOrFail($id);

    // Update data produk
    $produk->nama_produk = $request->editNamaProduk;
    $produk->harga = $request->editHarga;
    $produk->stok = $request->editStok;
    $produk->deskripsi = $request->editDeskripsi;
    $produk->kategori_id = $request->editKategori; // Update kategori

    // Proses upload gambar produk jika ada
    if ($request->hasFile('editGambarProduk')) {
        // Hapus gambar lama jika ada
        if ($produk->gambar_produk) {
            $oldGambarPath = public_path('images/produk/' . $produk->gambar_produk);
            if (file_exists($oldGambarPath)) {
                unlink($oldGambarPath);
            }
        }

        $gambar = $request->file('editGambarProduk');
        $namaGambar = time() . '.' . $gambar->getClientOriginalExtension();
        $gambar->move(public_path('images/produk'), $namaGambar);
        $produk->gambar_produk = $namaGambar;
    }

    // Simpan perubahan
    $produk->save();

    // Redirect atau berikan respon yang sesuai
    return redirect()->route('penjual.produk')->with('success', 'Produk berhasil diperbarui.');
}



    
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }

    public function index(){
        {
            $produks = Produk::all();
            return view('Layouts.shop_detail', compact('produks'));
        }
    }

    public function hide($id)
{
    $produk = Produk::findOrFail($id);
    $produk->is_hidden = true;
    $produk->save();

    return response()->json(['message' => 'Produk berhasil disembunyikan']);
}

public function unhide($id)
{
    try {
        $produk = Produk::findOrFail($id);
        $produk->is_hidden = false;
        $produk->save();

        return response()->json(['message' => 'Produk berhasil ditampilkan kembali']);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Terjadi kesalahan saat menampilkan produk'], 500);
    }
}

}
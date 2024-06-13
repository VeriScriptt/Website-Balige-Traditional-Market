<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Facades\File;


class KategoriController extends Controller
{
    public function show ($kategori_id)
    {
        $kategori = Kategori::findOrFail($kategori_id);
        $products = $kategori->produks()->paginate(12);

        return view('layouts.kategori', compact('kategori', 'products'));
    }

    public function kategori()
    {
        $kategori = Kategori::all();
        return view('admin.kategori', compact('kategori'));
    }

    public function tambahkategori()
    {
        return view('admin.tambahkategori');
    }


    public function storekategori(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $kategori = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nama_foto = time().'.'.$foto->getClientOriginalExtension();
            $foto->move(public_path('images/kategori'), $nama_foto);
            $kategori->foto = $nama_foto;
        }

        $kategori->save();

        return redirect()->route('kategori')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function editkategori($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.editkategori', compact('kategori'));
    }

    public function updatekategori(Request $request, $id)
{
    // Validate input
    $validatedData = $request->validate([
        'nama_kategori' => 'required|string|max:255',
        'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Find the category to be updated
    $kategori = Kategori::findOrFail($id);

    // Update the category data
    $kategori->nama_kategori = $request->input('nama_kategori');

    // Process the image upload if there is a new image
    if ($request->hasFile('foto')) {
        // Delete the old image if it exists
        if ($kategori->foto) {
            $oldImagePath = public_path('images/kategori/' . $kategori->foto);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        // Save the new image
        $image = $request->file('foto');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/kategori'), $imageName);
        $kategori->foto = $imageName;
    }

    // Save the changes
    $kategori->save();

    // Redirect or provide an appropriate response
    return redirect()->route('kategori')->with('success', 'Kategori berhasil diperbarui.');
}


    // public function updatekategori(Request $requestt)
    // {
    //     $requestt->validate([
    //         'kategori_id' => 'required|exists:kategori,id',
    //         'nama_kategori' => 'required|string|max:255',
    //         'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);


    //     $kategori = Kategori::findOrFail($requestt->kategori_id);

    //     $kategori->nama_kategori = $requestt->nama_kategori;

    //     if ($requestt->hasFile('foto')) {
    //         if ($kategori->foto) {
    //             $oldImagePath = public_path('images/kategori/' . $kategori->foto);
    //             if (File::exists($oldImagePath)) {
    //                 unlink($oldImagePath);
    //             }
    //         }

    //         $foto = $requestt->file('foto');
    //         $nama_foto = time() . '.' . $foto->getClientOriginalExtension();
    //         $foto->move(public_path('images/kategori'), $nama_foto);
    //         $kategori->foto = $nama_foto;
    //     }

    //     $kategori->save();

    //     return redirect()->route('kategori')->with('success', 'Kategori berhasil diubah');
    // }

    public function deletekategori($id)
{
    $kategori = Kategori::findOrFail($id);
    $kategori->delete();

    return redirect()->route('kategori')->with('success', 'Kategori berhasil dihapus');
}
}

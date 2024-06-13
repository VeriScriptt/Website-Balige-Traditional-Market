<?php

namespace App\Http\Controllers;

use App\Models\Caraousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarouselController extends Controller
{

    public function index()
    {
        $carousels = Caraousel::where('user_id', Auth::id())->paginate(10);
        return view('admin.caraousel', compact('carousels'));
    }

    


    public function create()
    {
        return view('admin.caraousel.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'gambar_caraousel' => 'required|image|max:5120',
    ]);

    // Simpan gambar caraousel
    if ($request->hasFile('gambar_caraousel')) {
        $image = $request->file('gambar_caraousel');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/caraousel'), $imageName);
    } else {
        return redirect()->back()->withErrors(['error' => 'Gambar Caraousel diperlukan.']);
    }

    $carousel = new Caraousel;
    $carousel->user_id = Auth::id();
    $carousel->title = $request->title;
    $carousel->deskripsi = $request->deskripsi;
    $carousel->gambar_caraousel = $imageName;
    $carousel->save();

    return redirect()->route('carousel.index')->with('success', 'Carousel created successfully.');
}

    public function edit(Caraousel $carousel)
    {
        return view('admin.caraousel.edit', compact('carousel'));
    }

    
    public function update(Request $request, Caraousel $carousel)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'gambar_caraousel' => 'nullable|image|max:5120',
    ]);

    $carousel->title = $request->title;
    $carousel->deskripsi = $request->deskripsi;
        // Proses upload gambar Caraousel jika ada
        if ($request->hasFile('gambar_caraousel')) {
            // Hapus gambar lama jika ada
            if ($carousel->gambar_caraousel) {
                $oldGambarPath = public_path('images/caraousel/' . $carousel->gambar_caraousel);
                if (file_exists($oldGambarPath)) {
                    unlink($oldGambarPath);
                }
            }
    
            $gambar = $request->file('gambar_caraousel');
            $namaGambar = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('images/caraousel'), $namaGambar);
            $carousel->gambar_caraousel = $namaGambar;
        }
    
    $carousel->save();

    return redirect()->route('carousel.index')->with('success', 'Caraousel updated successfully.');
}

    public function destroy(Caraousel $carousel)
    {
        $carousel->delete();
        return redirect()->route('carousel.index')->with('success', 'Caraousel deleted successfully.');
    }
}
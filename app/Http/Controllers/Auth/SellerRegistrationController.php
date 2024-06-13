<?php
namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\Rules\Password;

class SellerRegistrationController extends Controller
{
    /**
     * Display the registration view for sellers.
     */
    public function create(): View
    {
        return view('auth.register_penjual');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
            'nama_toko' => ['nullable', 'string', 'max:255'],
            'nik' => ['nullable', 'string', 'max:255'],
            'tanggal_lahir' => ['nullable', 'date'],
            'nomor_toko' => ['nullable', 'string', 'max:255'],
            'lantai_toko' => ['nullable', 'string', 'in:Lantai 1,Lantai 2,Balairung'],
            'nomor_telepon' => ['nullable', 'string', 'max:13'],
            'gambar_toko' => ['nullable', 'image', 'max:2048'],
        ]);
    
        // Handle the file upload for user profile picture
        if ($request->hasFile('gambar_toko')) {
            $image = $request->file('gambar_toko');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/gambar_toko'), $imageName);
        } else {
            return redirect()->back()->withErrors(['error' => 'Gambar produk diperlukan.']);
        }
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'penjual',
            'verified' => 0,
            'nama_toko' => $request->nama_toko,
            'nik' => $request->nik,
            'tanggal_lahir' => $request->tanggal_lahir,
            'nomor_toko' => $request->nomor_toko,
            'lantai_toko' => $request->lantai_toko,
            'nomor_telepon' => $request->nomor_telepon,
            'gambar_toko' => $imageName, 
        ]);

    
        event(new Registered($user));
        
        return redirect('login')->with('status', 'Pendaftaran akun Penjual berhasil. Silakan tunggu hingga akun Anda diverifikasi lalu login disini , Pemberitahuan akan disampaikan melalui WhatsApp.');
    }
    

    /**
     * Handle an incoming registration request for sellers.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // public function storeSeller(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //         'nama_toko' => ['required', 'string', 'max:255'],
    //         'nama_pemilik' => ['required', 'string', 'max:255'],
    //         'nik' => ['required', 'string', 'max:255'],
    //         'tanggal_lahir' => ['required', 'date'],
    //         'nomor_toko' => ['required', 'string', 'max:255'],
    //         'lantai_toko' => ['required', 'string', 'in:Lantai 1,Lantai 2,Balairung'],
    //         'nomor_telepon' => ['required', 'string', 'max:255'],
    //         'gambar_toko' => ['required', 'image', 'max:2048'], // Validate image file
    //     ]);

    //     // Handle the file upload
    //     $path = $request->file('gambar_toko')->store('gambar_toko', 'public');

    //     // Create a new user with the role 'penjual'
    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //         'role' => 'penjual',
    //         'nama_toko' => $request->nama_toko,
    //         'nama_pemilik' => $request->nama_pemilik,
    //         'nik' => $request->nik,
    //         'tanggal_lahir' => $request->tanggal_lahir,
    //         'nomor_toko' => $request->nomor_toko,
    //         'lantai_toko' => $request->lantai_toko,
    //         'nomor_telepon' => $request->nomor_telepon,
    //         'gambar_toko' => $path, // Store the path of the uploaded file
    //     ]);

    //     // Fire the Registered event
    //     event(new Registered($user));

    //     // Log in the user
    //     Auth::login($user);

    //     // Redirect the user to the seller dashboard page
    //     return redirect()->route('penjual.dashboard');
    // }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Services\TwilioService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules\Password;


class AdminController extends Controller
{
    public function admin()
    {
        $user = User::all();
        $kategori = Kategori::all();
        $pendingSellers = User::where('role', 'penjual')->where('verified','0')->count();


        // Mengirimkan data user ke view
        return view('admin.admin', compact('user','kategori','pendingSellers'));
    }

    public function index()
    {
        $orders = Order::with('orderItems.produk', 'user')->get();
        return view('admin.persetujuan', compact('orders'));
    }

    public function updateStatusTransaksi(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        $order = Order::findOrFail($id);
        $order->status = $request->input('status');
        $order->save();

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui.');
    }

    public function pembeli()
    {
    // Mengambil data user dengan role 'pembeli'
    $pembeli = User::where('role', 'pembeli')->get();

    // Mengirimkan data user ke view
    return view('admin.pembeli', compact('pembeli'));
    }

    
    public function akun_penjual()
    {
    // Mengambil data user dengan role 'penjual'
    $penjual = User::where('role', 'penjual')->get();

    // Mengirimkan data user ke view
    return view('admin.penjual', compact('penjual'));
    }

    public function penjual()
    {
        return view('penjual.welcome2');
    }

    public function deletePembeli($id)
    {
        // Find the user by ID and delete
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.pembeli')->with('success', 'User deleted successfully');
    }

    public function deactivatePembeli($id)
    {
        // Find the user by ID and deactivate (set a 'deactivated' flag)
        $user = User::findOrFail($id);
        $user->active = false; // Assuming there is an 'active' column in the users table
        $user->save();

        return redirect()->route('admin.pembeli')->with('success', 'User deactivated successfully');
    }

    // app/Http/Controllers/AdminController.php

    public function activatePembeli($id)
    {
        $user = User::findOrFail($id);
        $user->active = true;
        $user->save();

        return redirect()->route('admin.pembeli')->with('success', 'User activated successfully');
    }


    public function deactivatePenjual($id)
    {
        // Find the user by ID and deactivate (set a 'deactivated' flag)
        $user = User::findOrFail($id);
        $user->active = false; // Assuming there is an 'active' column in the users table
        $user->save();

        return redirect()->route('admin.penjual')->with('success', 'User deactivated successfully');
    }


    public function activatePenjual($id)
    {
        $user = User::findOrFail($id);
        $user->active = true;
        $user->save(); 

        return redirect()->route('admin.penjual')->with('success', 'User activated successfully');
    }

    public function verifyPenjual($id)
    {
        // Find the user by ID and verify (set the 'verified' flag to true)
        $user = User::findOrFail($id);
        $user->verified = true;
        $user->save();

        return redirect()->route('admin.penjual')->with('success', 'User verified successfully');
    }

    public function unverifyPenjual($id)
    {
        // Find the user by ID and unverify (set the 'verified' flag to false)
        $user = User::findOrFail($id);
        $user->verified = false;
        $user->save();

        return redirect()->route('admin.penjual')->with('success', 'User unverified successfully');
    }

    protected $twilio;

    public function __construct(TwilioService $twilio)
    {
        $this->twilio = $twilio;
    }

    public function verify($id)
    {
        $penjual = User::findOrFail($id);
        $penjual->verified = true;
        $penjual->save();

        // Kirim notifikasi ke WhatsApp
        $this->twilio->sendWhatsAppMessage(
            $penjual->nomor_telepon,
            "Selamat! Akun di Website Partiga-tiga telah diverifikasi. Anda sekarang dapat menikmati fitur penuh kami dan dipersilahkan mengunjungi website ."
        );
        
        return redirect()->back()->with('success', 'Akun penjual berhasil diverifikasi.');
    }
    
    public function unverify($id)
    {
        $penjual = User::findOrFail($id);
        $penjual->verified = false;
        $penjual->save();
        $this->twilio->sendWhatsAppMessage(
            $penjual->nomor_telepon,
            "Opps akun anda di unverified sepertinya terjadi sesuatu ."
        );
        
        return redirect()->back()->with('success', 'Verifikasi akun penjual berhasil dibatalkan.');
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
        
        return redirect('admin/penjual')->with('status', 'Pendaftaran akun Penjual berhasil. Silakan tunggu hingga akun Anda diverifikasi lalu login disini , Pemberitahuan akan disampaikan melalui WhatsApp.');
    }

}

<?php
namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
    
        $request->session()->regenerate();
    
        // Mendapatkan pengguna yang diautentikasi
        $user = $request->user();
        if (!$user->active) {
            Auth::logout();
            return redirect()->route('login')->withErrors(['Akun anda Telah di Non-Aktifkan Karena Beberapa Alasan.']);
        }
    
        // Memeriksa jika pengguna memiliki peran 'penjual' dan belum diverifikasi
        if ($user->role == 'penjual' && !$user->verified) {
            Auth::logout();
            return redirect()->route('login')->withErrors(['Akun anda belum diverifikasi.']);
        }
    
        // Memeriksa jika pengguna memiliki peran 'admin'
        if ($user->role == 'admin') {
            // Jika pengguna adalah admin, arahkan ke halaman admin
            return redirect()->route('admin.dashboard');
        } elseif ($user->role == 'penjual') {
            return redirect()->route('penjual.dashboard');
        }
    
        // Jika pengguna bukan admin, arahkan ke halaman yang dituju sebelumnya
        return redirect()->intended(RouteServiceProvider::HOME);
    }
    

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

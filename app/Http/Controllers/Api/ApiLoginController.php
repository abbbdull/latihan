<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class ApiLoginController extends Controller
{
    private $apiUrl = 'http://localhost/latihan6/api/logout/proses'; // Pastikan URL dimulai dengan http:// atau https://

    public function logoutproses()
    {
        // Mendapatkan token dari sesi pengguna (asumsi token disimpan dalam sesi)
        $token = session('api_token'); // Pastikan token disimpan di sesi atau cara lain

        // Melakukan permintaan POST ke API logout dengan token
        // $response = Http::withToken($token)->post($this->apiUrl);

        // Memeriksa apakah logout berhasil berdasarkan status respons
        if ($token) {
            // Hapus token dari sesi
            session()->forget('api_token');
            session()->forget('id');
            session()->forget('name');
            session()->forget('email');
            session()->forget('id_role');
            // Redirect ke halaman login jika logout berhasil
            return redirect()->route('login')->with('message', 'Logout berhasil.');
        } else {
            // Jika logout gagal, tampilkan pesan error
            return redirect()->back()->withErrors(['error' => 'Logout gagal.']);
        }
    }
    // public function logout(Request $request)
    // {
    //     Auth::logout();
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();

    //     return redirect()->route('login')->with('success', 'Anda telah berhasil keluar.');
    // }
}

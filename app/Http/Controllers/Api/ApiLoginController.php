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
        // Melakukan permintaan POST ke API logout
        $response = Http::post($this->apiUrl);

        // Memeriksa apakah logout berhasil berdasarkan status respons
        if ($response->successful()) {
            // Redirect ke halaman login jika logout berhasil
            return redirect()->route('login')->with('message', 'Logout berhasil.');
        } else {
            // Jika logout gagal, kembalikan respons atau tampilkan pesan error
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

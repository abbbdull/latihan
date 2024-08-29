<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OngkirController extends Controller
{
    public function getProvinces()
    {
        // API Key dan URL
        $apiKey = '8cf577073ce7b9d72d77f7cceac30cd3'; // Ganti dengan API Key Anda
        $url = 'https://api.rajaongkir.com/starter/province';

        // Mengirim permintaan ke API RaJaongkir
        $response = Http::withHeaders([
            'key' => $apiKey
        ])->get($url);

        // Mengembalikan data dari API
        return response($response->body(), $response->status())
            ->header('Content-Type', 'application/json')
            ->header('Access-Control-Allow-Origin', '*'); // Tambahkan header CORS
    }

    public function getCity(Request $request)
    {
        $provinceId = $request->input('province');

        if (empty($provinceId)) {
            return response()->json(['error' => 'Province ID is required'], 400);
        }

        $apiKey = '8cf577073ce7b9d72d77f7cceac30cd3'; // Ganti dengan API Key Anda
        $url = 'https://api.rajaongkir.com/starter/city?province=' . $provinceId;

        $response = Http::withHeaders([
            'key' => $apiKey
        ])->get($url);

        return response($response->body(), $response->status())
            ->header('Content-Type', 'application/json')
            ->header('Access-Control-Allow-Origin', '*');
    }
}

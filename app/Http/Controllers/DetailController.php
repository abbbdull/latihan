<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class DetailController extends Controller
{

    public function index($id)
    {
        $apiUrl = 'localhost/latihan6/api/produk/'.$id;
        $response = Http::get($apiUrl);
        $produk = $response->json();
        return view('produk.detail', compact('produk'));
    }
}


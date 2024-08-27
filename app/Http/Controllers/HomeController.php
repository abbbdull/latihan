<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{

    private $apiUrl = 'localhost/latihan6/api/produk';
    public function index() {
        $response = Http::get($this->apiUrl);
        $produk = $response->json();
        return view('home', compact('produk'));
      }
      public function dashboard() {


        return view('dashboard');
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ApiProdukController extends Controller
{

        private $apiUrl = 'localhost/latihan6/api/produk';

        public function index()
        {
            $response = Http::get($this->apiUrl);
            $produk = $response->json();

            // dd($produk);
            return view('home')->with('produk', $produk);
        }


        public function show($id)
        {
            $response = Http::get("{$this->apiUrl}/{$id}");
            $produk = $response->json();

            return view('produk.show', ['produk' => $produk]);
        }

        public function store(Request $request)
        {
            $response = Http::post($this->apiUrl, $request->all());
            $produk= $response->json();

            return redirect()->route('master.produk.index');
        }

        public function update(Request $request, $id)
        {
            $response = Http::put("{$this->apiUrl}/{$id}", $request->all());
            $produk = $response->json();

            return redirect()->route('produk.index');
        }

        public function destroy($id)
        {
            Http::delete("{$this->apiUrl}/{$id}");

            return redirect()->route('produk.index');
        }
    }



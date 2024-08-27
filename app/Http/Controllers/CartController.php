<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CartController extends Controller
{
    public function index()
    {
        // Data produk yang ingin dikirim ke view
        $products = [
            [
                'name' => 'Nama Produk',
                'price' => 68000,
                'image' => 'images/item-6.jpg',
                'quantity' => 1,
                'total' => 120000
            ],
            [
                'name' => 'Nama Produk 2',
                'price' => 75000,
                'image' => 'images/item-7.jpg',
                'quantity' => 2,
                'total' => 150000
            ],
            // Tambahkan produk lainnya sesuai kebutuhan
        ];

        // Data untuk elemen-elemen di view
        $productDetails = 'Product Details';
        $price = 'Price';
        $quantity = 'Quantity';
        $total = 'Total';
        $remove = 'Remove';

        // Return view dengan data
        return view('produk.cart', [
            'products' => $products,
            'productDetails' => $productDetails,
            'price' => $price,
            'quantity' => $quantity,
            'total' => $total,
            'remove' => $remove
        ]);
    }

    public function getKeranjangByUser($id)
    {
        // URL API untuk mendapatkan data produk berdasarkan ID
        $apiUrl = 'localhost/latihan6/api/keranjang' . $id;

        // Mengirimkan permintaan GET ke API
        $response = Http::get($apiUrl);

        // Mengambil data JSON dari respons
        $produk = $response->json();

        // Mengembalikan data ke view
        return view('cart', compact('produk'));
    }
}

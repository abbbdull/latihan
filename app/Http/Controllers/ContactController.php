<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail; // Pastikan kamu membuat mail class ini

class ContactController extends Controller
{
    public function show()
    {
        return view('produk.contact');
    }
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:2000',
        ]);

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        // Kirim email (menggunakan Laravel's Mail Facade)
        Mail::to('your-email@example.com')->send(new \App\Mail\ContactMail($details));

        return back()->with('success', 'Your message has been sent!');
    }
}

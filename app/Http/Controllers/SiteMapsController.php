<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteMapsController extends Controller
{
/**
     * Show the sitemap page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('sitemap');
    }
}

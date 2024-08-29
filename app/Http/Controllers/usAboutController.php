<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class usAboutController extends Controller
{
    /**
     * Display the About Us page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('usAbout');
    }
}

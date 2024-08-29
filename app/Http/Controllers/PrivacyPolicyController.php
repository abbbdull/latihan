<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    /**
     * Display the Privacy Policy page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('privacy');
    }
}

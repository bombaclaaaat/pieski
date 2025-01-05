<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Definicja metody index
    public function index()
    {
        return view('home');  // Przekierowanie do widoku 'home'
    }
}

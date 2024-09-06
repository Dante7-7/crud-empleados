<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class categoriaController extends Controller
{
    public function index()
    {
        
        return view('categoria');
    }
}

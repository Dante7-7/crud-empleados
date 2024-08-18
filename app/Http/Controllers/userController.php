<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    public function showLogin()
    {
        return view('login'); // Retorna la vista del formulario de login
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticación exitosa
            return redirect()->route('home'); // Redirige a la vista de home
        }

        // Autenticación fallida
        return redirect()->route('login')->withErrors(['login_error' => 'Email o Contraseña inconrrecta intentelo nuevamente']);
    }

    public function home()
    {
        // Pasar la variable a la vista
        return view('home');
    }
}

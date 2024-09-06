<?php
use App\Http\Controllers\homeController;
use App\Http\Controllers\personaController;
use App\Http\Controllers\userController;
use App\Http\Controllers\registerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productoController;
use App\Http\Controllers\categoriaController;

Route::get('/', homeController::class);

Route::resource('personas', PersonaController::class);

// Ajuste de la ruta de 'home' para el PersonaController
Route::get('home', [PersonaController::class, 'index'])->name('home');

Route::get('login', [userController::class, 'showLogin'])->name('login');
Route::post('login', [userController::class, 'login']); // Ruta para procesar el login

Route::get('register', [registerController::class, 'showRegister'])->name('register');
Route::post('register', [registerController::class, 'register']);
//pdf
Route::get('pdftodos',[personaController::class,'pdftodos'])->name('pdftodos');
Route::get('pdf/{id}', [personaController::class, 'pdf'])->name('pdf');

Route::get('/principio', function () {return view('principio');})->name('principio');

Route::resource('productos', productoController::class);

Route::resource('categorias', CategoriaController::class);

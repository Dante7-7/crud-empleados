<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Producto; 


class productoController extends Controller
{
     // Método para mostrar el formulario de creación de un nuevo producto
     public function create()
     {
         return view('components.crearProductos');
     }
 
     // Método para guardar un nuevo producto en la base de datos
     public function store(Request $request)
     {
         // Validar los datos del formulario
         $request->validate([
             'nombre' => 'required|string|max:255',
             'descripcion' => 'nullable|string',
             'precio' => 'required|numeric|min:0',
             'cantidad_en_stock' => 'required|integer|min:0',

         ]);
 
 
         // Crear el nuevo producto
         Producto::create([
             'nombre' => $request->nombre,
             'descripcion' => $request->descripcion,
             'precio' => $request->precio,
             'cantidad_en_stock' => $request->cantidad_en_stock,

         ]);
 
         // Redirigir a una página de éxito o de lista de productos
         return redirect()->route('principio')->with('success', 'Producto creado exitosamente');
     }
}

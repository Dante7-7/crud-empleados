<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class personaController extends Controller
{

   /**
     * Muestra una lista de personas.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Obtener el término de búsqueda del formulario
        $search = $request->input('search');

        // Consulta inicial de todas las personas
        $query = Persona::query();

        if ($search) {
            $registros = Persona::where('name', 'like', '%' . $search . '%')
                                ->orWhere('lastname', 'like', '%' . $search . '%')
                                ->paginate(5); // O el número de registros por página que desees mostrar
        } else {
            $registros = Persona::paginate(5); // Obtener todos los registros paginados por defecto
        }

        return view('home', compact('registros', 'search'));
    }
    //para ver todos en el pdf 
    public function pdftodos()
    {
        $perso=Persona::all();
        $pdf=Pdf::loadView('components.pdftodos',compact('perso'));
        return $pdf->stream();
        //return view('components.pdftodos');
    }
    //para ver uno solo en el pdf
    public function pdf($id)
    {
        $pers=Persona::find($id);
        $pdf=Pdf::loadView('components.pdf',compact('pers'));
        return $pdf->stream();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('components.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|min:4|max:100',
            'lastname' => 'required|string|min:4|max:100',
            'fecha_de_nacimiento' => 'required|date',
            'email' => 'required|email|unique:personas,email',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $persona = new Persona;
        $persona->name = $validatedData['name'];
        $persona->lastname = $validatedData['lastname'];
        $persona->fecha_de_nacimiento = Carbon::createFromFormat('Y-m-d', $validatedData['fecha_de_nacimiento']);
        $persona->email = $validatedData['email'];

        if ($request->hasFile('imagen')) {
            $imagen=$request->file('imagen');
            $imagename='imagen'. time() . '.' . $imagen->getClientOriginalExtension();
            $imagerut= $imagen->storeAs('imagenes_p',$imagename,'public');
            $persona->imagen=$imagerut; 
        }

        $persona->save();

        return redirect()->route('personas.index')->with('success', 'Persona creada con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $persona = Persona::find($id);
        return view('components.show', compact('persona'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $persona = Persona::find($id);
        return view('components.update', compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|min:4|max:100',
        'lastname' => 'required|string|min:4|max:100',
        'fecha_de_nacimiento' => 'required|date',
        // Añade la regla unique con excepción del registro actual
        'email' => 'required|email|unique:personas,email,'.$id,
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $persona = Persona::findOrFail($id);

    // Manejar la imagen si se está actualizando
    if ($request->hasFile('imagen')) {
        $imagen = $request->file('imagen');
        $imageName = 'imagen'. time() . '.' . $imagen->getClientOriginalExtension();
        $imagePath = $imagen->storeAs('imagenes_p', $imageName, 'public');

        // Eliminar la imagen anterior si existe
        if (!is_null($persona->imagen) && Storage::disk('public')->exists($persona->imagen)) {
            Storage::disk('public')->delete($persona->imagen);
        }

        // Guardar la nueva ruta de la imagen
        $persona->imagen = $imagePath; 
    }

    // Actualizar los otros campos de la persona
    $persona->name = $request->input('name');
    $persona->lastname = $request->input('lastname');
    $persona->fecha_de_nacimiento = $request->input('fecha_de_nacimiento');
    $persona->email = $request->input('email');

    // Guardar los cambios
    $persona->save();

    return redirect()->route('personas.index')->with('success', 'Persona actualizada correctamente.');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $persona = Persona::findOrFail($id);
        if(!is_null($persona->imagen)&& Storage::disk('public')->exists($persona->imagen)){
            Storage::disk('public')->delete($persona->imagen);
        }
        $persona->delete();
        return redirect()->route('personas.index')->with('success', 'Persona eliminada con éxito.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\TbWasher;
use Illuminate\Http\Request;

class LavadoraController extends Controller
{
    /**
     * Mostrar el formulario para registrar una lavadora
     */
    public function create()
    {
        return view('dueno.registrar_lavadora');
    }
    
    /**
     * Guardar una nueva lavadora
     */
    public function store(Request $request)
    {
        // Validación de los datos recibidos en el formulario
        $request->validate([
            'type' => 'required|in:ch,g,plus', // Los tipos de lavadora permitidos
            'price' => 'required|numeric',    // El precio debe ser numérico
        ]);
    
        // Crear una nueva lavadora en la base de datos
        TbWasher::create([
            'type' => $request->type,
            'price' => $request->price,
        ]);
    
        // Redirigir a la página de listado de lavadoras con un mensaje de éxito
        return redirect()->route('lavadoras.index')->with('success', 'Lavadora registrada exitosamente.');
    }
    
    /**
     * Mostrar todas las lavadoras registradas
     */
    public function index()
    {
        $lavadoras = TbWasher::all(); // Obtiene todas las lavadoras
        return view('dueno.lavadoras_index', compact('lavadoras')); // Muestra la vista de gestión de lavadoras
    }

    /**
     * Muestra las lavadoras basadas en la búsqueda (por ID o tipo)
     */
    public function eliminar(Request $request)
    {
        // Verifica si existe un valor de búsqueda
        if ($request->filled('search')) {
            // Filtra por ID o tipo
            $lavadoras = TbWasher::where('id', $request->search)
                ->orWhere('type', 'like', '%' . $request->search . '%')
                ->get();
        } else {
            // Si no hay búsqueda, muestra todas las lavadoras
            $lavadoras = TbWasher::all();
        }

        return view('dueno.eliminar_lavadora', compact('lavadoras')); // Muestra la vista de eliminar lavadoras
    }

    /**
     * Elimina una lavadora por su ID
     */
    public function destroy($id)
    {
        $lavadora = TbWasher::findOrFail($id); // Encuentra la lavadora por ID
        $lavadora->delete(); // Elimina la lavadora de la base de datos

        // Redirige a la vista de eliminar lavadora con un mensaje de éxito
        return redirect()->route('lavadoras.eliminar')->with('success', 'Lavadora eliminada correctamente.');
    }
}

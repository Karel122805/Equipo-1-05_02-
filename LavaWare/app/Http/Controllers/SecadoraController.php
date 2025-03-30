<?php

namespace App\Http\Controllers;

use App\Models\TbDryingMachine;
use Illuminate\Http\Request;

class SecadoraController extends Controller
{
    // Muestra las secadoras registradas
    public function index()
    {
        // Obtiene todas las secadoras registradas
        $secadoras = TbDryingMachine::all(); 
        // Muestra la vista para gestionar secadoras
        return view('dueno.secadoras_index', compact('secadoras')); 
    }

    // Muestra el formulario para registrar una nueva secadora
    public function create()
    {
        return view('dueno.registrar_secadora');
    }

    // Guarda una nueva secadora
    public function store(Request $request)
    {
        // Valida el precio de la secadora
        $request->validate([
            'price' => 'required|numeric',
        ]);

        // Crea la secadora en la base de datos
        $secadora = TbDryingMachine::create([
            'price' => $request->price,
        ]);

        // Si la secadora se guarda correctamente
        if ($secadora) {
            // Redirige al formulario de registro con un mensaje de éxito
            return redirect()->route('secadoras.create')->with('success', 'Secadora registrada exitosamente.');
        } else {
            // Si ocurre un error, redirige al formulario de registro con un mensaje de error
            return redirect()->route('secadoras.create')->with('error', 'Hubo un error al registrar la secadora.');
        }
    }

    // Muestra la vista de eliminar secadoras
    public function eliminar(Request $request)
    {
        // Si hay un valor de búsqueda (ID), filtra por ese ID
        if ($request->filled('search')) {
            $secadoras = TbDryingMachine::where('id', $request->search)->get();
        } else {
            $secadoras = TbDryingMachine::all();
        }

        // Muestra la vista de eliminar secadoras
        return view('dueno.eliminar_secadora', compact('secadoras'));
    }

    // Elimina una secadora por su ID
    public function destroy($id)
    {
        // Encuentra la secadora por ID
        $secadora = TbDryingMachine::findOrFail($id);
        // Elimina la secadora
        $secadora->delete();

        // Redirige a la vista de eliminar secadoras con un mensaje de éxito
        return redirect()->route('secadoras.eliminar')->with('success', 'Secadora eliminada correctamente.');
    }
}

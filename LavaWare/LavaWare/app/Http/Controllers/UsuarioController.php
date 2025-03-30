<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UsuarioController extends Controller
{
    public function create()
    {
        return view('dashboard.registrar_usuario');
    }

    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|in:dueno,empleado'
        ]);

        try {
            // Creación del usuario en la base de datos
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role
            ]);

            return redirect()->route('usuarios.create')->with('success', 'Usuario registrado exitosamente.');

        } catch (\Exception $e) {
            // Registro del error en los logs de Laravel
            Log::error('Error al registrar usuario: ' . $e->getMessage());

            return redirect()->route('usuarios.create')->with('error', 'Hubo un problema al registrar el usuario. Intente de nuevo.');
        }
    }
}

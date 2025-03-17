<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Exception;

class RegisterController extends Controller
{
    public function registerDueno(Request $request)
    {
        // Validar los datos
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Si hay errores, redirigir con mensajes de error
        if ($validator->fails()) {
            return redirect()->route('dueno.register.view')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Crear el usuario
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'dueno',
            ]);

            return redirect()->route('dueno.login.view')->with('success', 'Registro exitoso, inicia sesión.');
        } catch (Exception $e) {
            return redirect()->route('dueno.register.view')->with('error', 'Hubo un problema al registrar el usuario.');
        }
    }

    public function registerEmpleado(Request $request)
    {
        // Validar los datos
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Si hay errores, redirigir con mensajes de error
        if ($validator->fails()) {
            return redirect()->route('empleado.register.view')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Crear el usuario
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'empleado',
            ]);

            return redirect()->route('empleado.login.view')->with('success', 'Registro exitoso, inicia sesión.');
        } catch (Exception $e) {
            return redirect()->route('empleado.register.view')->with('error', 'Hubo un problema al registrar el usuario.');
        }
    }
}

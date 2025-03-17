<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginDueno(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            if ($user->role === 'dueno') {
                return redirect()->route('dueno.dashboard')->with('success', '¡Bienvenido, Dueño!');
            }
        }

        // 🔴 Devuelve mensaje de error si las credenciales no son correctas
        return redirect()->route('dueno.login.view')->withErrors(['error' => 'Correo o contraseña incorrectos.']);
    }

    public function loginEmpleado(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role === 'empleado') {
                return redirect()->route('empleado.dashboard')->with('success', '¡Bienvenido, Empleado!');
            }
        }

        // 🔴 Devuelve mensaje de error si las credenciales no son correctas
        return redirect()->route('empleado.login.view')->withErrors(['error' => 'Correo o contraseña incorrectos.']);
    }

    /**
     * Cerrar sesión para cualquier usuario autenticado.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        
        // Invalida la sesión y regenera el token CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirige al menú principal
        return redirect()->route('menu')->with('success', 'Sesión cerrada exitosamente.');
    }
}

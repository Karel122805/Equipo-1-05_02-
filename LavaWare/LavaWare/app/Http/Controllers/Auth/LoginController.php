<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\EmployeeSession; // Importamos el modelo

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
                // 🔵 Registrar hora de entrada
                EmployeeSession::create([
                    'user_id' => $user->id,
                    'ip_address' => $request->ip(),
                    'login_time' => now()
                ]);

                return redirect()->route('empleado.dashboard')->with('success', '¡Bienvenido, Empleado!');
            }
        }

        return redirect()->route('empleado.login.view')->withErrors(['error' => 'Correo o contraseña incorrectos.']);
    }

    /**
     * Cerrar sesión para cualquier usuario autenticado.
     */
    public function logout(Request $request)
    {
        $user = Auth::user();

        // 🔴 Registrar hora de salida si es empleado
        if ($user && $user->role === 'empleado') {
            $lastSession = EmployeeSession::where('user_id', $user->id)
                            ->whereNull('logout_time')
                            ->latest()
                            ->first();

            if ($lastSession) {
                $lastSession->update([
                    'logout_time' => now()
                ]);
            }
        }

        // 🔁 Cerrar sesión
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('menu')->with('success', 'Sesión cerrada exitosamente.');
    }
}

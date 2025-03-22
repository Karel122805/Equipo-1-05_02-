<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EmpleadoSessionController;
use Illuminate\Support\Facades\Auth;

// 🔷 Menú principal
Route::get('/', function () {
    return view('menu');
})->name('menu');

// 🔹 Grupo de rutas para Dueño
Route::prefix('dueno')->group(function () {
    // Iniciar sesión
    Route::get('/login', function () {
        return view('auth.dueno_login');
    })->name('dueno.login.view');
    
    Route::post('/login', [LoginController::class, 'loginDueno'])->name('dueno.login');

    // Registro de dueño
    Route::get('/register', function () {
        return view('auth.dueno_register');
    })->name('dueno.register.view');
    
    Route::post('/register', [RegisterController::class, 'registerDueno'])->name('dueno.register');

    // Dashboard Dueño
    Route::get('/dashboard', function () {
        return view('dashboard.dueno');
    })->name('dueno.dashboard');

    // Ver sesiones de empleados (registro de entrada y salida)
    Route::get('/sesiones-empleados', [EmpleadoSessionController::class, 'index'])
        ->name('dueno.sesiones')
        ->middleware('auth');

    // Registrar Usuarios (Empleados y Dueños)
    Route::get('/registrar-usuario', [UsuarioController::class, 'create'])->name('usuarios.create');
    Route::post('/registrar-usuario', [UsuarioController::class, 'store'])->name('usuarios.store');
});

// 🔹 Grupo de rutas para Empleado
Route::prefix('empleado')->group(function () {
    // Iniciar sesión
    Route::get('/login', function () {
        return view('auth.empleado_login');
    })->name('empleado.login.view');
    
    Route::post('/login', [LoginController::class, 'loginEmpleado'])->name('empleado.login');

    // Registro de empleado
    Route::get('/register', function () {
        return view('auth.empleado_register');
    })->name('empleado.register.view');
    
    Route::post('/register', [RegisterController::class, 'registerEmpleado'])->name('empleado.register');

    // Dashboard Empleado
    Route::get('/dashboard', function () {
        return view('dashboard.empleado');
    })->name('empleado.dashboard');
});

// 🔸 Cerrar sesión para cualquier usuario
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// 🔧 Ruta fallback para evitar error "Route [login] not defined"
Route::get('/login', function () {
    return redirect()->route('menu');
})->name('login');

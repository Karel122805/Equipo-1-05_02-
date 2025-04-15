<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EmpleadoSessionController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\LavadoraController;
use App\Http\Controllers\SecadoraController;
use App\Http\Controllers\PedidoController;  // Asegúrate de agregar el controlador de pedidos
use Illuminate\Support\Facades\Auth;

// Menú principal
Route::get('/', function () {
    return view('menu');
})->name('menu');

// Grupo de rutas para Dueño
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

    // Ver sesiones de empleados
    Route::get('/sesiones-empleados', [EmpleadoSessionController::class, 'index'])->name('dueno.sesiones')->middleware('auth');

    // Registrar Usuarios
    Route::get('/registrar-usuario', [UsuarioController::class, 'create'])->name('usuarios.create');
    Route::post('/registrar-usuario', [UsuarioController::class, 'store'])->name('usuarios.store');

    // Alta de Productos
    Route::get('/alta-producto', function () {
        return view('dueno.alta_producto');
    })->name('dueno.productos.create');
    Route::post('/productos', [ProductoController::class, 'store'])->name('dueno.productos.store');

    // Baja de Productos
    Route::get('/baja-productos', [ProductoController::class, 'index'])->name('dueno.productos.baja');
    Route::delete('/productos/{id}', [ProductoController::class, 'destroy'])->name('dueno.productos.destroy');

    // Inventario
    Route::get('/inventario', [ProductoController::class, 'inventario'])->name('dueno.inventario');

    // Ruta para gestionar lavadoras
    Route::get('/dueno/lavadoras', [LavadoraController::class, 'index'])->name('lavadoras.index');
    Route::get('/dueno/registrar-lavadora', [LavadoraController::class, 'create'])->name('lavadoras.create');
    Route::post('/dueno/lavadoras', [LavadoraController::class, 'store'])->name('lavadoras.store');
    Route::get('/dueno/eliminar-lavadora', [LavadoraController::class, 'eliminar'])->name('lavadoras.eliminar');
    Route::delete('/dueno/lavadoras/{id}', [LavadoraController::class, 'destroy'])->name('lavadoras.destroy');

    // Ruta para gestionar secadoras
    Route::get('/registrar-secadora', [SecadoraController::class, 'create'])->name('secadoras.create');
    Route::post('/registrar-secadora', [SecadoraController::class, 'store'])->name('secadoras.store');
    Route::get('/secadoras', [SecadoraController::class, 'index'])->name('secadoras.index');
    Route::get('/eliminar-secadora', [SecadoraController::class, 'eliminar'])->name('secadoras.eliminar');
    Route::delete('/secadoras/{id}', [SecadoraController::class, 'destroy'])->name('secadoras.destroy');

    // Ruta para gestionar pedidos
    Route::get('/pedidos/create', [PedidoController::class, 'create'])->name('empleado.pedidos.create'); // Ruta para crear un pedido
    Route::post('/pedidos', [PedidoController::class, 'store'])->name('empleado.pedidos.store'); // Ruta para almacenar un pedido
    Route::get('/pedidos', [PedidoController::class, 'index'])->name('empleado.pedidos.index'); // Ruta para ver todos los pedidos
    Route::get('/pedidos/edit/{id}', [PedidoController::class, 'edit'])->name('empleado.pedidos.edit'); // Ruta para modificar un pedido
    Route::put('/pedidos/{id}', [PedidoController::class, 'update'])->name('empleado.pedidos.update'); // Ruta para actualizar un pedido
    Route::get('/pedidos/cancel/{id}', [PedidoController::class, 'cancel'])->name('empleado.pedidos.cancel'); // Ruta para cancelar un pedido

    Route::get('/pedidos', [PedidoController::class, 'verPedidosDueno'])->name('dueno.pedidos.ver');

});

// Grupo de rutas para Empleado
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

    // Dashboard Empleado (evita error empleado.dashboard)
    Route::get('/dashboard', function () {
        return view('dashboard.empleado');
    })->name('empleado.dashboard');

    // Nuevo menú de selección
    Route::get('/registrar-pedido', function () {
        return view('empleado.registrar_pedido');
    })->name('empleado.pedidos.menu');
    
    // Ver pedidos y generar PDF
    Route::get('/pedidos/ver', [PedidoController::class, 'verPedidos'])->name('empleado.pedidos.ver');
    Route::get('/pedidos/reporte', [PedidoController::class, 'generarPDF'])->name('empleado.pedidos.reporte');

    // Ver listado de pedidos
    Route::get('/empleado/pedidos', [PedidoController::class, 'index'])->name('empleado.pedidos.index');

    // Editar pedido
    Route::get('/empleado/pedidos/edit/{id}', [PedidoController::class, 'edit'])->name('empleado.pedidos.edit');


    // Actualizar pedido
    Route::put('/empleado/pedidos/{id}', [PedidoController::class, 'update'])->name('empleado.pedidos.update');


    Route::get('/pedidos', [PedidoController::class, 'listaPedidos'])->name('empleado.pedidos.index');



// Lavado con entrega
Route::get('/registrar-pedido/entrega', [PedidoController::class, 'vistaLavadoEntrega'])->name('empleado.pedidos.dropoff.create');
Route::post('/registrar-pedido/entrega', [PedidoController::class, 'store'])->name('empleado.pedidos.dropoff.store');

// Autolavado
Route::get('/registrar-pedido/autolavado', [PedidoController::class, 'vistaAutolavado'])->name('empleado.pedidos.autolavado.create');
Route::post('/registrar-pedido/autolavado', [PedidoController::class, 'store'])->name('empleado.pedidos.autolavado.store');

    
});



// Cerrar sesión para cualquier usuario
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Ruta fallback para evitar error "Route [login] not defined"
Route::get('/login', function () {
    return redirect()->route('menu');
})->name('login');

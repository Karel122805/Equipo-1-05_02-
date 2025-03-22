@extends('layouts.app')

@section('title', 'Menú Dueño')

@section('content')
<div class="dashboard-container">
        <h1>Bienvenido, Dueño</h1>
        <p>Aquí podrás gestionar la lavandería y los empleados.</p>

        <!-- Contenedor para los botones -->
        <div class="button-container">
<<<<<<< HEAD
            <a href="{{ route('usuarios.create') }}" class="btn btn-warning button-full">Registrar Nuevo Usuario</a>
            <a href="{{ route('dueno.productos.create') }}" class="btn btn-warning button-full">Registrar Nuevo Producto</a>
=======
        <a href="{{ route('usuarios.create') }}" class="btn btn-warning button-full">Registrar Nuevo Usuario</a>
        <a href="{{ route('dueno.productos.create') }}" class="btn btn-warning button-full">Registrar Nuevo Producto</a>
>>>>>>> 6612130 (HU13 y actualizacion de archivos)
            <a href="{{ route('menu') }}" class="btn btn-info button-full">Registrar Nueva Lavadora</a>
            <a href="{{ route('menu') }}" class="btn btn-info button-full">Registrar Nueva Secadora</a>
            <a href="{{ route('menu') }}" class="btn btn-success button-full">Generar Reporte</a>
            <a href="{{ route('dueno.inventario') }}" class="btn btn-dark button-full">Inventario</a>
            <a href="{{ route('dueno.sesiones') }}" class="btn btn-light button-full">Control de Horarios de Usuarios</a>
<<<<<<< HEAD
<<<<<<< HEAD
            <a href="{{ route('menu') }}" class="btn btn-primary button-full">Dashboard</a>
=======
            <a href="{{ route('menu') }}" class="btn btn-warning button-full">Dashboard</a>
>>>>>>> d7f6ef3 (HU12 y HU07)
=======
            <a href="{{ route('menu') }}" class="btn btn-warning button-full">Dashboard</a>
>>>>>>> 6612130 (HU13 y actualizacion de archivos)

            <!-- Botón de Cerrar Sesión -->
            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="btn btn-danger button-full logout-btn">Cerrar Sesión</button>
            </form>
        </div>
    </div>
@endsection

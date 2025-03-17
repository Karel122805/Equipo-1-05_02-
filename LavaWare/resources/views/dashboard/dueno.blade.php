@extends('layouts.app')

@section('title', 'Menú Dueño')

@section('content')
<div class="dashboard-container">
        <h1>Bienvenido, Dueño</h1>
        <p>Aquí podrás gestionar la lavandería y los empleados.</p>

        <!-- Contenedor para los botones -->
        <div class="button-container">
            <a href="{{ route('usuarios.create') }}" class="btn btn-primary button-full">Registrar Nuevo Usuario</a>
            <a href="{{ route('menu') }}" class="btn btn-warning button-full">Registrar Nuevo Producto</a>
            <a href="{{ route('menu') }}" class="btn btn-info button-full">Registrar Nueva Lavadora</a>
            <a href="{{ route('menu') }}" class="btn btn-info button-full">Registrar Nueva Secadora</a>
            <a href="{{ route('menu') }}" class="btn btn-success button-full">Generar Reporte</a>
            <a href="{{ route('menu') }}" class="btn btn-dark button-full">Inventario</a>
            <a href="{{ route('menu') }}" class="btn btn-light button-full">Control de Horarios de Usuarios</a>
            <a href="{{ route('menu') }}" class="btn btn-primary button-full">Dashboard</a>

            <!-- Botón de Cerrar Sesión -->
            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="btn btn-danger button-full logout-btn">Cerrar Sesión</button>
            </form>
        </div>
    </div>
@endsection

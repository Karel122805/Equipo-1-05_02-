@extends('layouts.app')

@section('title', 'Menú Dueño')

@section('content')
<div class="dashboard-container">
        <h1>Bienvenido, Dueño</h1>
        <p>Aquí podrás gestionar la lavandería y los empleados.</p>

        <!-- Contenedor para los botones -->
        <div class="button-container">
            <a href="{{ route('usuarios.create') }}" class="btn btn-warning button-full">Registrar Nuevo Usuario</a>
            <a href="{{ route('dueno.productos.create') }}" class="btn btn-warning button-full">Gestionar Productos</a>
            <a href="{{ route('lavadoras.index') }}" class="btn btn-info button-full">Gestionar Lavadoras</a>
            <a href="{{ route('secadoras.create') }}" class="btn btn-info button-full">Gestionar Secadoras</a>
            <a href="{{ route('dueno.inventario') }}" class="btn btn-dark button-full">Inventario</a>
            <a href="{{ route('dueno.sesiones') }}" class="btn btn-light button-full">Control de Horarios de Usuarios</a>
            <a href="{{ route('dueno.pedidos.ver') }}" class="btn btn-info button-full">Ver Pedidos / Generar Reporte</a>

            <!-- Botón de Cerrar Sesión -->
            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="btn btn-danger button-full logout-btn">Cerrar Sesión</button>
            </form>
        </div>
    </div>
@endsection

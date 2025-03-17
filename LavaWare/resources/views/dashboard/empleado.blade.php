@extends('layouts.app')

@section('title', 'Menú Empleado')

@section('content')
    <div class="dashboard-container">
        <h1>Bienvenido, Empleado</h1>
        <p>Aquí podrás gestionar los pedidos y ventas.</p>

        <!-- Contenedor para los botones -->
        <div class="button-container">
            <a href="{{ route('menu') }}" class="btn btn-primary button-full">Registrar Pedido</a>
            <a href="{{ route('menu') }}" class="btn btn-warning button-full">Modificar Pedido</a>
            <a href="{{ route('menu') }}" class="btn btn-info button-full">Generar Reporte</a>

            <!-- Botón de Cerrar Sesión -->
            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="btn btn-danger button-full logout-btn">Cerrar Sesión</button>
            </form>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('title', 'Menú Empleado')

@section('content')
<div class="dashboard-container">
    <h1>Bienvenido, Empleado</h1>
    <p>Aquí podrás gestionar los pedidos y ventas.</p>

    <!-- Contenedor para los botones -->
    <div class="button-container">
        <!-- Botón para registrar un nuevo pedido -->
        <a href="{{ route('empleado.pedidos.create') }}" class="btn btn-warning button-full">Registrar Pedido</a>

        <a href="{{ route('empleado.pedidos.index') }}" class="btn btn-info button-full">Ver Pedidos / Generar Reporte</a>

        <!-- Botón de Cerrar Sesión -->
        <form action="{{ route('logout') }}" method="POST" class="logout-form">
            @csrf
            <button type="submit" class="btn btn-danger button-full logout-btn">Cerrar Sesión</button>
        </form>
    </div>
</div>
@endsection

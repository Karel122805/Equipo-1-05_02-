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

            <!-- Botón para modificar un pedido (debe tener el ID de un pedido, si ya hay uno) -->
            <!-- Se debe verificar que el pedido exista en la variable $pedido -->
            @isset($pedido)
                <a href="{{ route('empleado.pedidos.edit', $pedido->id) }}" class="btn btn-warning button-full">Modificar Pedido</a>
            @else
                <a href="{{ route('empleado.pedidos.index') }}" class="btn btn-warning button-full">Modificar Pedido</a>
            @endisset

            <!-- Botón para generar el reporte (esto depende de la implementación del reporte) -->
            <a href="{{ route('empleado.pedidos.index') }}" class="btn btn-warning button-full">Generar Reporte</a>

            <!-- Botón de Cerrar Sesión -->
            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="btn btn-danger button-full logout-btn">Cerrar Sesión</button>
            </form>
        </div>
    </div>
@endsection

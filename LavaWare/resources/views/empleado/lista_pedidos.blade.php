@extends('layouts.app')

@section('content')
<div class="product-form-container">
    <h2>Lista de  Pedidos</h2>

    {{-- Mensaje de éxito --}}
    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    {{-- Botón para generar reporte --}}
    <div class="text-center mb-4">
        <a href="{{ route('empleado.pedidos.reporte') }}" class="btn btn-danger">Generar Reporte PDF</a>
    </div>

    {{-- Tabla con scroll --}}
    <div class="table-scroll-container">
        <table class="session-history-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Servicio</th>
                    <th>Kilos</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pedidos as $pedido)
                    <tr>
                        <td>{{ $pedido->id }}</td>
                        <td>{{ $pedido->customer_name }}</td>
                        <td>{{ $pedido->service_type }}</td>
                        <td>{{ $pedido->quantity_kg ?? '-' }}</td>
                        <td>{{ $pedido->date }}</td>
                        <td>${{ number_format($pedido->total, 2) }}</td>
                        <td>{{ ucfirst($pedido->status) }}</td>
                        <td>
                            <a href="{{ route('empleado.pedidos.edit', $pedido->id) }}" class="btn btn-primary btn-sm">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Botones --}}
    <div class="mt-4 text-center d-flex justify-content-center gap-3 flex-wrap">
    <a href="{{ route('empleado.dashboard') }}" class="btn-men">Volver al Menú Principal</a>

    </div>
</div>
@endsection

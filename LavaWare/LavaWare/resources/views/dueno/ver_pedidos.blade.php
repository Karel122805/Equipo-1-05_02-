@extends('layouts.app')

@section('content')
<div class="product-form-container">
    <h2>Listado de Pedidos</h2>

    {{-- Botón para generar reporte --}}
    <div class="text-center mb-4">
        <a href="{{ route('empleado.pedidos.reporte') }}" class="btn btn-danger">Generar Reporte PDF</a>
    </div>

    {{-- Tabla de pedidos con scroll --}}
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
                </tr>
            </thead>
            <tbody>
                @forelse($pedidos as $pedido)
                    <tr>
                        <td>{{ $pedido->id }}</td>
                        <td>{{ $pedido->customer_name }}</td>
                        <td>{{ $pedido->service_type }}</td>
                        <td>{{ $pedido->quantity_kg ?? '-' }}</td>
                        <td>{{ $pedido->date }}</td>
                        <td>${{ number_format($pedido->total, 2) }}</td>
                        <td>{{ ucfirst($pedido->status) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">No hay pedidos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Botones de navegación --}}
    <div class="mt-4 text-center d-flex justify-content-center gap-3 flex-wrap">
        <a href="{{ route('dueno.dashboard') }}" class="btn-men">Volver al Menú Principal</a>
    </div>
</div>
@endsection

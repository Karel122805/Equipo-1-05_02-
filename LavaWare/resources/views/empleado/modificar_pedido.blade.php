@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modificar Pedido</h2>

    {{-- Mensaje de éxito --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('empleado.pedidos.update', $pedido->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="customer_name">Nombre del Cliente:</label>
            <input type="text" name="customer_name" value="{{ old('customer_name', $pedido->customer_name) }}" required>
        </div>

        <div>
            <label for="service_type">Tipo de Servicio:</label>
            <select name="service_type" required>
                <option value="self_service" {{ $pedido->service_type == 'self_service' ? 'selected' : '' }}>Self Service</option>
                <option value="drop_off" {{ $pedido->service_type == 'drop_off' ? 'selected' : '' }}>Drop Off</option>
            </select>
        </div>

        <div>
            <label for="quantity_kg">Cantidad (kg):</label>
            <input type="number" name="quantity_kg" value="{{ old('quantity_kg', $pedido->quantity_kg) }}">
        </div>

        <div>
            <label for="total">Total:</label>
            <input type="number" name="total" value="{{ old('total', $pedido->total) }}" required>
        </div>

        <div>
            <label for="status">Estado:</label>
            <select name="status" required>
                <option value="completed" {{ $pedido->status == 'completed' ? 'selected' : '' }}>Completado</option>
                <option value="canceled" {{ $pedido->status == 'canceled' ? 'selected' : '' }}>Cancelado</option>
            </select>
        </div>

        <button type="submit">Actualizar Pedido</button>
    </form>
</div>
@endsection

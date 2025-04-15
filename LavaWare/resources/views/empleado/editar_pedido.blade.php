@extends('layouts.app')

@section('content')
<div class="product-form-container">
    <h2 class="text-center mb-4">Modificar Pedido</h2>

    <form method="POST" action="{{ route('empleado.pedidos.update', $pedido->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label><strong>Nombre del Cliente:</strong></label>
            <input type="text" name="customer_name" value="{{ $pedido->customer_name }}" required class="form-control">
        </div>

        <div class="form-group mb-3">
            <label><strong>Fecha:</strong></label>
            <input type="date" name="date" value="{{ $pedido->date }}" required class="form-control">
        </div>

        <div class="form-group mb-3">
            <label><strong>Status:</strong></label>
            <select name="status" class="form-control" required>
                <option value="completed" {{ $pedido->status == 'completed' ? 'selected' : '' }}>Completado</option>
                <option value="canceled" {{ $pedido->status == 'canceled' ? 'selected' : '' }}>Cancelado</option>
            </select>
        </div>

        <div class="d-flex justify-content-between mt-3">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="{{ route('empleado.pedidos.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection

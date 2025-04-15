@extends('layouts.app')

@section('content')
<div class="product-form-container d-flex justify-content-center mt-5" style="max-height: 5500px;">
    <div class="card p-4 shadow" style="width: 450px; border-radius: 20px; overflow-y: auto; max-height: 530px;">
        <h4 class="text-center mb-4">Registrar Pedido - Lavado con Entrega</h4>

        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('empleado.pedidos.dropoff.store') }}">
            @csrf

            <div class="form-group mb-3">
                <label><strong>Nombre del Cliente:</strong></label>
                <input type="text" name="customer_name" required class="form-control">
            </div>

            <div class="form-group mb-3">
                <label><strong>Fecha:</strong></label>
                <input type="date" name="date" required class="form-control">
            </div>

            <div class="form-group mb-3">
                <label><strong>Kilos Lavados:</strong></label>
                <input type="number" name="quantity_kg" id="quantity_kg" required class="form-control">
            </div>

            <div class="form-group mt-3 mb-4">
                <label><strong>Total a pagar:</strong></label>
                <input type="text" id="total" name="total" readonly class="form-control" value="0.00">
            </div>

            <input type="hidden" name="service_type" value="drop_off">
            <input type="hidden" name="status" value="completed">

            <div class="d-flex justify-content-between mt-4 flex-wrap gap-2">
                <button type="submit" class="btn btn-primary">Registrar</button>
                <a href="{{ route('empleado.dashboard') }}" class="btn-men">Volver al Menú Principal</a>
                <button onclick="window.history.back()" class="btn-reg">Regresar</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const inputKg = document.getElementById('quantity_kg');
        const totalField = document.getElementById('total');

        inputKg.addEventListener('input', function () {
            const kg = parseFloat(this.value) || 0;
            const total = kg * 22;
            totalField.value = total.toFixed(2);
        });
    });
</script>
@endsection

@extends('layouts.app')

@section('content')
<div class="text-center mt-5">
    <h2>¿Qué tipo de pedido deseas registrar?</h2>
    @if(session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif

    <div class="d-flex justify-content-between mt-4 flex-wrap gap-2">
        <a href="{{ route('empleado.pedidos.dropoff.create') }}" class="btn btn-ser">Lavado con Entrega</a>
        <a href="{{ route('empleado.pedidos.autolavado.create') }}" class="btn btn-serc">Autolavado</a>
        <a href="{{ route('empleado.dashboard') }}" class="btn-men">Volver al Menú Principal</a>
        </div>
</div>
@endsection

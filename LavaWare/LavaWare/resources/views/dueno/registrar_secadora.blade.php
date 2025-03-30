@extends('layouts.app')

@section('content')
<div class="product-form-container">
    <h2>Registrar Nueva Secadora</h2>

    {{-- Mensaje de éxito --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Mensaje de error --}}
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    {{-- Errores de validación --}}
    @if($errors->any())
        <div class="alert alert-danger text-start">
            <strong>Se encontraron los siguientes errores:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('secadoras.store') }}" method="POST">
        @csrf

        <div>
            <label for="price">Precio:</label>
            <input type="number" step="0.01" name="price" id="price" value="{{ old('price') }}" required>
        </div>

        <div class="d-flex justify-content-between mt-4 flex-wrap gap-2">
            <button type="submit" class="btn btn-primary">Registrar</button>
            <a href="{{ route('secadoras.eliminar') }}" class="btn btn-danger">Eliminar Secadora</a>
            <a href="{{ route('dueno.dashboard') }}" class="btn-men">Volver al Menú Principal</a>
        </div>
    </form>
</div>
@endsection

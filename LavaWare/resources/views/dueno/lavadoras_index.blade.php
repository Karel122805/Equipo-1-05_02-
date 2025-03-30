@extends('layouts.app')

@section('content')
<div class="product-form-container">
    <h2>Registrar Nueva Lavadora</h2>

    {{-- Mensaje de éxito --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
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

    <form action="{{ route('lavadoras.store') }}" method="POST">
        @csrf

        <div>
            <label for="type">Tipo:</label>
            <select name="type" id="type" required>
                <option value="" disabled selected>Selecciona un tipo</option>
                <option value="ch">Ch</option>
                <option value="g">G</option>
                <option value="plus">Plus</option>
            </select>
        </div>

        <div>
            <label for="price">Precio:</label>
            <input type="number" step="0.01" name="price" id="price" value="{{ old('price') }}" required>
        </div>

        <div class="d-flex justify-content-between mt-4 flex-wrap gap-2">
            <button type="submit" class="btn btn-primary">Registrar</button>
            <a href="{{ route('lavadoras.eliminar') }}" class="btn btn-danger">Eliminar Lavadora</a>
            <a href="{{ route('dueno.dashboard') }}" class="btn-men">Volver al Menú Principal</a>
        </div>
    </form>
</div>
@endsection


@extends('layouts.app')

@section('content')
<div class="product-form-container">
    <h2>Registrar Nuevo Producto</h2>

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

    <form action="{{ route('dueno.productos.store') }}" method="POST">
        @csrf

        <div>
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        </div>

        <div>
            <label for="category">Categoría:</label>
            <input type="text" name="category" id="category" value="{{ old('category') }}" required>
        </div>

        <div>
            <label for="brand">Marca:</label>
            <input type="text" name="brand" id="brand" value="{{ old('brand') }}" required>
        </div>

        <div>
            <label for="price">Precio:</label>
            <input type="number" step="0.01" name="price" id="price" value="{{ old('price') }}" required>
        </div>

        <div>
            <label for="stock">Cantidad:</label>
            <input type="number" name="stock" id="stock" value="{{ old('stock') }}" required>
        </div>

        <div class="d-flex justify-content-between mt-4 flex-wrap gap-2">
<<<<<<< HEAD
        <a href="{{ route('dueno.dashboard') }}" class="btn-men">Volver al Menú Principal</a>
        <a href="{{ route('dueno.productos.baja') }}" class="btn btn-danger">Eliminar producto</a>
            <button type="submit" class="btn btn-primary">Agregar</button>
=======
        <button type="submit" class="btn btn-primary">Registrar</button>
        <a href="{{ route('dueno.productos.baja') }}" class="btn btn-danger">Eliminar producto</a>
        <a href="{{ route('dueno.dashboard') }}" class="btn-men">Volver al Menú Principal</a>

>>>>>>> 6612130 (HU13 y actualizacion de archivos)
        </div>
    </form>
</div>
@endsection

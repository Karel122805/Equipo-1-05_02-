@extends('layouts.app')

@section('content')
<div class="product-form-container">
    <h2>Inventario</h2>

    {{-- Formulario de búsqueda unificada --}}
    <form method="GET" action="{{ route('dueno.inventario') }}" class="session-search-form d-flex justify-content-center gap-4 flex-wrap">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar por ID, nombre, marca o categoría..." class="form-control" style="width: 300px;">
        <button type="submit" class="btn btn-success">Buscar</button>
        <a href="{{ route('dueno.inventario') }}" class="btn btn-secondary">Limpiar</a>
    </form>


    {{-- Tabla con scroll --}}
    <div class="table-scroll-container mx-auto" style="max-height: 300px; overflow-y: auto; width: 100%;">
    <table class="session-history-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Categoría</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                @forelse($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->name }}</td>
                        <td>{{ $producto->brand }}</td>
                        <td>{{ $producto->category }}</td>
                        <td>{{ $producto->stock }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No hay productos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Botón para volver --}}
    <div class="mt-4 text-center">
        <a href="{{ route('dueno.dashboard') }}" class="btn-men">Volver al Menú</a>
    </div>
</div>
@endsection

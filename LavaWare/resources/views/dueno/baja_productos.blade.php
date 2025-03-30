@extends('layouts.app')

@section('content')
<div class="product-form-container">
    <h2>Eliminar Productos</h2>

    {{-- Formulario de búsqueda --}}
    <form method="GET" action="{{ route('dueno.productos.baja') }}" class="session-search-form d-flex justify-content-center gap-4 flex-wrap">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar producto..." class="form-control" style="width: 250px;">
        <button type="submit" class="btn btn-primary">Buscar</button>
        <a href="{{ route('dueno.productos.baja') }}" class="btn btn-secondary">Limpiar</a>
    </form>

    {{-- Mensaje de éxito --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Tabla con scroll --}}
    <div class="table-scroll-container">
        <table class="session-history-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @forelse($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->name }}</td>
                        <td>{{ $producto->stock }}</td>
                        <td>
                            <form action="{{ route('dueno.productos.destroy', $producto->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este producto?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No hay productos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Botones de navegación --}}
    <div class="mt-4 text-center d-flex justify-content-center gap-3 flex-wrap">
        <a href="{{ route('dueno.dashboard') }}" class="btn-men">Volver al Menú Principal</a>
        <button onclick="window.history.back()" class="btn-reg">Regresar</button>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="product-form-container">
    <h2>Eliminar Secadoras</h2>

    {{-- Formulario de búsqueda --}}
    <form method="GET" action="{{ route('secadoras.eliminar') }}" class="session-search-form d-flex justify-content-center gap-4 flex-wrap">
        <input type="number" name="search" value="{{ request('search') }}" placeholder="Buscar por ID..." class="form-control" style="width: 250px;">
        <button type="submit" class="btn btn-primary">Buscar</button>
        <a href="{{ route('secadoras.eliminar') }}" class="btn btn-secondary">Limpiar</a>
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
                    <th>Precio</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @forelse($secadoras as $secadora)
                    <tr>
                        <td>{{ $secadora->id }}</td>
                        <td>{{ $secadora->price }}</td>
                        <td>
                            <form action="{{ route('secadoras.destroy', $secadora->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta secadora?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No hay secadoras registradas.</td>
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

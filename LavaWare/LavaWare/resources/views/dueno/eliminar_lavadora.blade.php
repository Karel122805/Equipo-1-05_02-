@extends('layouts.app')

@section('content')
<div class="product-form-container">
    <h2>Eliminar Lavadoras</h2>

    {{-- Formulario de búsqueda --}}
    <form method="GET" action="{{ route('lavadoras.eliminar') }}" class="session-search-form d-flex justify-content-center gap-4 flex-wrap">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar por ID o Tipo (Ch, G, Plus)" class="form-control" style="width: 250px;">
        <button type="submit" class="btn btn-primary">Buscar</button>
        <a href="{{ route('lavadoras.eliminar') }}" class="btn btn-secondary">Limpiar</a>
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
                    <th>Tipo</th>
                    <th>Precio</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @forelse($lavadoras as $lavadora)
                    <tr>
                        <td>{{ $lavadora->id }}</td>
                        <td>{{ $lavadora->type }}</td>
                        <td>{{ $lavadora->price }}</td>
                        <td>
                            <form action="{{ route('lavadoras.destroy', $lavadora->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta lavadora?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No hay lavadoras registradas.</td>
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

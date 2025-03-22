@extends('layouts.app')

@section('content')
    <div class="session-history-containerr">
<<<<<<< HEAD
<<<<<<< HEAD
        <h1>Historial de Entrada y Salida de Empleados</h1>
=======
        <h1>Control de Horario de Usuarios</h1>
>>>>>>> d7f6ef3 (HU12 y HU07)
=======
        <h1>Control de Horario de Usuarios</h1>
>>>>>>> 6612130 (HU13 y actualizacion de archivos)

        {{-- Formulario de búsqueda --}}
        <form method="GET" action="{{ route('dueno.sesiones') }}" class="session-search-form d-flex justify-content-center gap-4 flex-wrap">
            <div>
                <label for="nombre">Buscar por nombre:</label>
                <input type="text" name="nombre" id="nombre" value="{{ request('nombre') }}" placeholder="Ej. Paula">
            </div>

            <div>
                <label for="fecha">Buscar por fecha (dd/mm/aaaa):</label>
                <input type="text" name="fecha" id="fecha" value="{{ request('fecha') }}" placeholder="22/03/2025">
            </div>

            <div class="align-self-end d-flex gap-2">
                <button type="submit" class="btn btn-primary">Buscar</button>
                <a href="{{ route('dueno.sesiones') }}" class="btn btn-secondary">Limpiar</a>
            </div>
        </form>

        {{-- Mostrar solo 3 registros con scroll si no hay búsqueda --}}
        @php
            $buscando = request()->filled('nombre') || request()->filled('fecha');
        @endphp

        <div class="{{ $buscando ? '' : 'table-scroll-container' }}">
            <table class="session-history-table">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>IP</th>
                        <th>Hora de Entrada</th>
                        <th>Hora de Salida</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sesiones as $sesion)
                        <tr>
                            <td>{{ $sesion->user->name }}</td>
                            <td>{{ $sesion->ip_address ?? 'N/A' }}</td>
                            <td>{{ $sesion->login_time ? \Carbon\Carbon::parse($sesion->login_time)->format('d/m/Y H:i:s') : 'No registrada' }}</td>
                            <td>
                                @if ($sesion->logout_time)
                                    {{ \Carbon\Carbon::parse($sesion->logout_time)->format('d/m/Y H:i:s') }}
                                @else
                                    <span class="activo">Aún activo</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No hay registros disponibles.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="button-container">
<<<<<<< HEAD
<<<<<<< HEAD
                <a href="{{ route('dueno.dashboard') }}" class="btn-secondary">Volver al Panel</a>
            </div>
=======
        <a href="{{ route('dueno.dashboard') }}" class="btn-men">Volver al Menú Principal</a>
        </div>
>>>>>>> d7f6ef3 (HU12 y HU07)
=======
        <a href="{{ route('dueno.dashboard') }}" class="btn-men">Volver al Menú Principal</a>
        </div>
>>>>>>> 6612130 (HU13 y actualizacion de archivos)
    </div>
@endsection

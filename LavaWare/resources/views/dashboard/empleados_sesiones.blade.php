@extends('layouts.app')

@section('title', 'Sesiones de Empleados')

@section('content')
    <div class="dashboard-container">
        <h1>Sesiones de Empleados</h1>

        @if(session('error'))
            <p class="error">{{ session('error') }}</p>
        @endif

        <table>
            <thead>
                <tr>
                    <th>Empleado</th>
                    <th>Hora de Inicio</th>
                    <th>Hora de Cierre</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sesiones as $sesion)
                    <tr>
                        <td>{{ $sesion->usuario->name ?? 'No registrado' }}</td>
                        <td>{{ $sesion->hora_inicio }}</td>
                        <td>{{ $sesion->hora_fin ?? 'Aún activo' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('menu') }}" class="btn">Volver</a>
    </div>
@endsection


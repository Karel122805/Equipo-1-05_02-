@extends('layouts.app')

@section('content')
<div class="main-container">
    <div class="content-boxx">
        <h2>Registrar Nuevo Usuario</h2>

        <!-- Mensajes de éxito o error -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('usuarios.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="role">Rol del Usuario:</label>
                <select id="role" name="role" required>
                    <option value="dueno">Dueño</option>
                    <option value="empleado">Empleado</option>
                </select>
            </div>

            <!-- Botón de Registro -->
            <div class="button-container">
                <a href="{{ route('dueno.dashboard') }}" class="btn-secondary">Volver al Panel</a>
                <button type="submit" class="btn">Registrar Usuario</button>
            </div>

        </form>
    </div>
</div>
@endsection

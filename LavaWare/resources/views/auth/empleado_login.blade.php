@extends('layouts.app')

@section('content')
<div class="main-container">
    <div class="content-boxx">
        <h2>Iniciar Sesión - Empleado</h2>
        
        <form action="{{ route('empleado.login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <!-- Contenedor para los botones -->
            <div class="button-container">
                <button type="submit" class="btn">Iniciar Sesión</button>
                <a href="{{ route('menu') }}" class="btn btn-secondary">Regresar a Menú</a>
            </div>
        </form>

    </div>
</div>
@endsection


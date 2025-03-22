@extends('layouts.app')

@section('content')
<div class="main-container">
    <div class="content-boxx">
        <h2>Registro - Empleado</h2>
        <form action="{{ route('empleado.register') }}" method="POST">
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
                <label for="password_confirmation">Confirmar Contraseña:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>

            <div class="form-submit">
                <button type="submit" class="btn">Registrarse</button>
            </div>
        </form>

        <p>¿Ya tienes cuenta? <a href="{{ route('empleado.login.view') }}">Inicia sesión aquí</a></p>

        <button onclick="window.history.back()" class="btn">Regresar</button>
        <a href="{{ route('menu') }}" class="btn btn-men">Regresar a Menú</a>


    </div>
</div>
@endsection


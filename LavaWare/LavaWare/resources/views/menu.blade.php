@extends('layouts.app')

@section('title', 'Seleccionar Usuario')

@section('content')
    <div class="container">
        <h2>Selecciona tu tipo de usuario</h2>
        <div class="buttons">
            <a href="{{ route('dueno.login.view') }}" class="btn">Dueño</a>
            <a href="{{ route('empleado.login.view') }}" class="btn">Empleado</a>
        </div>
    </div>
@endsection

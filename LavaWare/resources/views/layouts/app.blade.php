<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'LavaWare')</title>
    
    <!-- Enlace al CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">
</head>
<body>
    @include('layouts.header')

    <main class="main-container">
        <div class="content-box">
            @yield('content')
        </div>
    </main>

    @include('layouts.footer')
</body>

</html>

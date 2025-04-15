<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Pedidos - LavaWare</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }

        header {
            text-align: center;
            margin-bottom: 30px;
        }

        header img {
            width: 80px;
            margin-bottom: 10px;
        }

        h3 {
            margin: 0;
            font-size: 18px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            padding: 6px;
            border: 1px solid #000;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        footer {
            text-align: center;
            font-size: 10px;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <header>
        <h3>Reporte de Pedidos - LavaWare</h3>
    </header>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Servicio</th>
                <th>Kilos</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->id }}</td>
                    <td>{{ $pedido->customer_name }}</td>
                    <td>{{ $pedido->service_type }}</td>
                    <td>{{ $pedido->quantity_kg ?? '-' }}</td>
                    <td>{{ $pedido->date }}</td>
                    <td>${{ number_format($pedido->total, 2) }}</td>
                    <td>{{ ucfirst($pedido->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <footer>
        &copy; {{ date('Y') }} LavaWare - Todos los derechos reservados.
    </footer>
</body>
</html>

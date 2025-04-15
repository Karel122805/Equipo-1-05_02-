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
            <?php $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($pedido->id); ?></td>
                    <td><?php echo e($pedido->customer_name); ?></td>
                    <td><?php echo e($pedido->service_type); ?></td>
                    <td><?php echo e($pedido->quantity_kg ?? '-'); ?></td>
                    <td><?php echo e($pedido->date); ?></td>
                    <td>$<?php echo e(number_format($pedido->total, 2)); ?></td>
                    <td><?php echo e(ucfirst($pedido->status)); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <footer>
        &copy; <?php echo e(date('Y')); ?> LavaWare - Todos los derechos reservados.
    </footer>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\LavaWare\resources\views/empleado/reporte_pedidos_pdf.blade.php ENDPATH**/ ?>
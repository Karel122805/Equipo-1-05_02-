

<?php $__env->startSection('title', 'Menú Empleado'); ?>

<?php $__env->startSection('content'); ?>
<div class="dashboard-container">
    <h1>Bienvenido, Empleado</h1>
    <p>Aquí podrás gestionar los pedidos y ventas.</p>

    <!-- Contenedor para los botones -->
    <div class="button-container">
        <!-- Botón para registrar un nuevo pedido -->
        <a href="<?php echo e(route('empleado.pedidos.create')); ?>" class="btn btn-warning button-full">Registrar Pedido</a>

        <a href="<?php echo e(route('empleado.pedidos.index')); ?>" class="btn btn-info button-full">Ver Pedidos / Generar Reporte</a>

        <!-- Botón de Cerrar Sesión -->
        <form action="<?php echo e(route('logout')); ?>" method="POST" class="logout-form">
            <?php echo csrf_field(); ?>
            <button type="submit" class="btn btn-danger button-full logout-btn">Cerrar Sesión</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\LavaWare\resources\views/dashboard/empleado.blade.php ENDPATH**/ ?>
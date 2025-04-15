

<?php $__env->startSection('title', 'Menú Dueño'); ?>

<?php $__env->startSection('content'); ?>
<div class="dashboard-container">
        <h1>Bienvenido, Dueño</h1>
        <p>Aquí podrás gestionar la lavandería y los empleados.</p>

        <!-- Contenedor para los botones -->
        <div class="button-container">
            <a href="<?php echo e(route('usuarios.create')); ?>" class="btn btn-warning button-full">Registrar Nuevo Usuario</a>
            <a href="<?php echo e(route('dueno.productos.create')); ?>" class="btn btn-warning button-full">Gestionar Productos</a>
            <a href="<?php echo e(route('lavadoras.index')); ?>" class="btn btn-info button-full">Gestionar Lavadoras</a>
            <a href="<?php echo e(route('secadoras.create')); ?>" class="btn btn-info button-full">Gestionar Secadoras</a>
            <a href="<?php echo e(route('dueno.inventario')); ?>" class="btn btn-dark button-full">Inventario</a>
            <a href="<?php echo e(route('dueno.sesiones')); ?>" class="btn btn-light button-full">Control de Horarios de Usuarios</a>
            <a href="<?php echo e(route('dueno.pedidos.ver')); ?>" class="btn btn-info button-full">Ver Pedidos / Generar Reporte</a>

            <!-- Botón de Cerrar Sesión -->
            <form action="<?php echo e(route('logout')); ?>" method="POST" class="logout-form">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn btn-danger button-full logout-btn">Cerrar Sesión</button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\LavaWare\resources\views/dashboard/dueno.blade.php ENDPATH**/ ?>
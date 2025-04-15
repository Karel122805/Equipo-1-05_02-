

<?php $__env->startSection('content'); ?>
<div class="text-center mt-5">
    <h2>¿Qué tipo de pedido deseas registrar?</h2>
    <?php if(session('success')): ?>
    <div class="alert alert-success text-center">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

    <div class="d-flex justify-content-between mt-4 flex-wrap gap-2">
        <a href="<?php echo e(route('empleado.pedidos.dropoff.create')); ?>" class="btn btn-ser">Lavado con Entrega</a>
        <a href="<?php echo e(route('empleado.pedidos.autolavado.create')); ?>" class="btn btn-serc">Autolavado</a>
        <a href="<?php echo e(route('empleado.dashboard')); ?>" class="btn-men">Volver al Menú Principal</a>
        </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\LavaWare\resources\views/empleado/registrar_pedido.blade.php ENDPATH**/ ?>
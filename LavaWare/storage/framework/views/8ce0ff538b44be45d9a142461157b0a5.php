

<?php $__env->startSection('title', 'Seleccionar Usuario'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2>Selecciona tu tipo de usuario</h2>
        <div class="buttons">
            <a href="<?php echo e(route('dueno.login.view')); ?>" class="btn">Dueño</a>
            <a href="<?php echo e(route('empleado.login.view')); ?>" class="btn">Empleado</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\LavaWare\resources\views/menu.blade.php ENDPATH**/ ?>
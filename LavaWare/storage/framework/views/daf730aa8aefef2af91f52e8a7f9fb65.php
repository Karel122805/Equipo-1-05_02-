

<?php $__env->startSection('content'); ?>
<div class="main-container">
    <div class="content-boxx">
        <h2>Iniciar Sesión - Dueño</h2>

        <form action="<?php echo e(route('dueno.login')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>

        <p>¿No tienes cuenta? <a href="<?php echo e(route('dueno.register.view')); ?>">Regístrate aquí</a></p>
    
        <!-- Contenedor para los botones -->
        <div class="d-flex justify-content-between mt-4 flex-wrap gap-2">
                <button type="submit" class="btn">Iniciar Sesión</button>
                <a href="<?php echo e(route('menu')); ?>" class="btn btn-men">Regresar a Menú</a>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\LavaWare\resources\views/auth/dueno_login.blade.php ENDPATH**/ ?>
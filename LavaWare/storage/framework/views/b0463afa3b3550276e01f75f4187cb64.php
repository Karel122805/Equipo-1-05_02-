

<?php $__env->startSection('content'); ?>
<div class="main-container">
    <div class="content-boxx">
        <h2>Registro - Dueño</h2>
        <form action="<?php echo e(route('dueno.register')); ?>" method="POST">
            <?php echo csrf_field(); ?>
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

            <!-- Contenedor para los botones -->
        <div class="d-flex justify-content-between mt-4 flex-wrap gap-2">
                <button type="submit" class="btn">Iniciar Sesión</button>
                <button onclick="window.history.back()" class="btn-reg">Regresar</button>
                <a href="<?php echo e(route('menu')); ?>" class="btn btn-men">Regresar a Menú</a>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\LavaWare\resources\views/auth/dueno_register.blade.php ENDPATH**/ ?>
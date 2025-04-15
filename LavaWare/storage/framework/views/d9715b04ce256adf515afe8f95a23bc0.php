

<?php $__env->startSection('content'); ?>
<div class="main-container">
    <div class="product-form-con">
        <h2>Registrar Nuevo Usuario</h2>

        <!-- Mensajes de éxito o error -->
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <?php if(session('error')): ?>
            <div class="alert alert-danger">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('usuarios.store')); ?>" method="POST">
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
                <label for="role">Rol del Usuario:</label>
                <select id="role" name="role" required>
                    <option value="dueno">Dueño</option>
                    <option value="empleado">Empleado</option>
                </select>
            </div>

            <!-- Botón de Registro -->
            <div class="d-flex justify-content-between mt-4 flex-wrap gap-2">
                <a href="<?php echo e(route('dueno.dashboard')); ?>" class="btn-men">Volver al Menú Principal</a>
                <button type="submit" class="btn btn-primary">Registrar Usuario</button>
            </div>

        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\LavaWare\resources\views/dashboard/registrar_usuario.blade.php ENDPATH**/ ?>
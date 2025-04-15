

<?php $__env->startSection('content'); ?>
<div class="product-form-container">
    <h2>Registrar Nueva Secadora</h2>

    
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

    
    <?php if($errors->any()): ?>
        <div class="alert alert-danger text-start">
            <strong>Se encontraron los siguientes errores:</strong>
            <ul class="mb-0">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('secadoras.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div>
            <label for="price">Precio:</label>
            <input type="number" step="0.01" name="price" id="price" value="<?php echo e(old('price')); ?>" required>
        </div>

        <div class="d-flex justify-content-between mt-4 flex-wrap gap-2">
            <button type="submit" class="btn btn-primary">Registrar</button>
            <a href="<?php echo e(route('secadoras.eliminar')); ?>" class="btn btn-danger">Eliminar Secadora</a>
            <a href="<?php echo e(route('dueno.dashboard')); ?>" class="btn-men">Volver al Menú Principal</a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\LavaWare\resources\views/dueno/registrar_secadora.blade.php ENDPATH**/ ?>
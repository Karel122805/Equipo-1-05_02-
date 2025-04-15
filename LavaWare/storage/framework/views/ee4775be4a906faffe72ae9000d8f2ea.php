

<?php $__env->startSection('content'); ?>
<div class="product-form-container">
    <h2>Registrar Nuevo Producto</h2>

    
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

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

    <form action="<?php echo e(route('dueno.productos.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div>
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" value="<?php echo e(old('name')); ?>" required>
        </div>

        <div>
            <label for="category">Categoría:</label>
            <input type="text" name="category" id="category" value="<?php echo e(old('category')); ?>" required>
        </div>

        <div>
            <label for="brand">Marca:</label>
            <input type="text" name="brand" id="brand" value="<?php echo e(old('brand')); ?>" required>
        </div>

        <div>
            <label for="price">Precio:</label>
            <input type="number" step="0.01" name="price" id="price" value="<?php echo e(old('price')); ?>" required>
        </div>

        <div>
            <label for="stock">Cantidad:</label>
            <input type="number" name="stock" id="stock" value="<?php echo e(old('stock')); ?>" required>
        </div>

        <div class="d-flex justify-content-between mt-4 flex-wrap gap-2">
        <button type="submit" class="btn btn-primary">Registrar</button>
        <a href="<?php echo e(route('dueno.productos.baja')); ?>" class="btn btn-danger">Eliminar producto</a>
        <a href="<?php echo e(route('dueno.dashboard')); ?>" class="btn-men">Volver al Menú Principal</a>

        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\LavaWare\resources\views/dueno/alta_producto.blade.php ENDPATH**/ ?>
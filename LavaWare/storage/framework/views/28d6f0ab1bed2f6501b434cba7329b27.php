

<?php $__env->startSection('content'); ?>
<div class="product-form-container">
    <h2>Inventario</h2>

    
    <form method="GET" action="<?php echo e(route('dueno.inventario')); ?>" class="session-search-form d-flex justify-content-center gap-4 flex-wrap">
        <input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="Buscar por ID, nombre, marca o categoría..." class="form-control" style="width: 300px;">
        <button type="submit" class="btn btn-success">Buscar</button>
        <a href="<?php echo e(route('dueno.inventario')); ?>" class="btn btn-secondary">Limpiar</a>
    </form>


    
    <div class="table-scroll-container mx-auto" style="max-height: 300px; overflow-y: auto; width: 100%;">
    <table class="session-history-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Categoría</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($producto->id); ?></td>
                        <td><?php echo e($producto->name); ?></td>
                        <td><?php echo e($producto->brand); ?></td>
                        <td><?php echo e($producto->category); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5">No hay productos registrados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    
    <div class="mt-4 text-center">
        <a href="<?php echo e(route('dueno.dashboard')); ?>" class="btn-men">Volver al Menú</a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\LavaWare\resources\views/dueno/inventario.blade.php ENDPATH**/ ?>
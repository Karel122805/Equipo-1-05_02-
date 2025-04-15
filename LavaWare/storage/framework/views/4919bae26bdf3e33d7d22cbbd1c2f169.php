

<?php $__env->startSection('content'); ?>
<div class="product-form-container">
    <h2>Eliminar Secadoras</h2>

    
    <form method="GET" action="<?php echo e(route('secadoras.eliminar')); ?>" class="session-search-form d-flex justify-content-center gap-4 flex-wrap">
        <input type="number" name="search" value="<?php echo e(request('search')); ?>" placeholder="Buscar por ID..." class="form-control" style="width: 250px;">
        <button type="submit" class="btn btn-primary">Buscar</button>
        <a href="<?php echo e(route('secadoras.eliminar')); ?>" class="btn btn-secondary">Limpiar</a>
    </form>

    
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    
    <div class="table-scroll-container">
        <table class="session-history-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Precio</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $secadoras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $secadora): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($secadora->id); ?></td>
                        <td><?php echo e($secadora->price); ?></td>
                        <td>
                            <form action="<?php echo e(route('secadoras.destroy', $secadora->id)); ?>" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta secadora?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="3">No hay secadoras registradas.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    
    <div class="mt-4 text-center d-flex justify-content-center gap-3 flex-wrap">
        <a href="<?php echo e(route('dueno.dashboard')); ?>" class="btn-men">Volver al Menú Principal</a>
        <button onclick="window.history.back()" class="btn-reg">Regresar</button>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\LavaWare\resources\views/dueno/eliminar_secadora.blade.php ENDPATH**/ ?>
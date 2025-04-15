

<?php $__env->startSection('content'); ?>
<div class="product-form-container">
    <h2>Eliminar Lavadoras</h2>

    
    <form method="GET" action="<?php echo e(route('lavadoras.eliminar')); ?>" class="session-search-form d-flex justify-content-center gap-4 flex-wrap">
        <input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="Buscar por ID o Tipo (Ch, G, Plus)" class="form-control" style="width: 250px;">
        <button type="submit" class="btn btn-primary">Buscar</button>
        <a href="<?php echo e(route('lavadoras.eliminar')); ?>" class="btn btn-secondary">Limpiar</a>
    </form>

    
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    
    <div class="table-scroll-container">
        <table class="session-history-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Precio</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $lavadoras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lavadora): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($lavadora->id); ?></td>
                        <td><?php echo e($lavadora->type); ?></td>
                        <td><?php echo e($lavadora->price); ?></td>
                        <td>
                            <form action="<?php echo e(route('lavadoras.destroy', $lavadora->id)); ?>" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta lavadora?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="4">No hay lavadoras registradas.</td>
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

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\LavaWare\resources\views/dueno/eliminar_lavadora.blade.php ENDPATH**/ ?>
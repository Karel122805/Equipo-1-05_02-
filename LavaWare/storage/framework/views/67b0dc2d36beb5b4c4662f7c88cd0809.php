

<?php $__env->startSection('content'); ?>
<div class="product-form-container">
    <h2>Listado de Pedidos</h2>

    
    <div class="text-center mb-4">
        <a href="<?php echo e(route('empleado.pedidos.reporte')); ?>" class="btn btn-danger">Generar Reporte PDF</a>
    </div>

    
    <div class="table-scroll-container">
        <table class="session-history-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Servicio</th>
                    <th>Kilos</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($pedido->id); ?></td>
                        <td><?php echo e($pedido->customer_name); ?></td>
                        <td><?php echo e($pedido->service_type); ?></td>
                        <td><?php echo e($pedido->quantity_kg ?? '-'); ?></td>
                        <td><?php echo e($pedido->date); ?></td>
                        <td>$<?php echo e(number_format($pedido->total, 2)); ?></td>
                        <td><?php echo e(ucfirst($pedido->status)); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7">No hay pedidos registrados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    
    <div class="mt-4 text-center d-flex justify-content-center gap-3 flex-wrap">
        <a href="<?php echo e(route('dueno.dashboard')); ?>" class="btn-men">Volver al Menú Principal</a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\LavaWare\resources\views/empleado/ver_pedidos.blade.php ENDPATH**/ ?>
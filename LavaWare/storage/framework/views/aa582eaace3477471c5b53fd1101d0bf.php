

<?php $__env->startSection('content'); ?>
<div class="product-form-container">
    <h2>Lista de  Pedidos</h2>

    
    <?php if(session('success')): ?>
        <div class="alert alert-success text-center">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    
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
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($pedido->id); ?></td>
                        <td><?php echo e($pedido->customer_name); ?></td>
                        <td><?php echo e($pedido->service_type); ?></td>
                        <td><?php echo e($pedido->quantity_kg ?? '-'); ?></td>
                        <td><?php echo e($pedido->date); ?></td>
                        <td>$<?php echo e(number_format($pedido->total, 2)); ?></td>
                        <td><?php echo e(ucfirst($pedido->status)); ?></td>
                        <td>
                            <a href="<?php echo e(route('empleado.pedidos.edit', $pedido->id)); ?>" class="btn btn-primary btn-sm">Editar</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    
    <div class="mt-4 text-center d-flex justify-content-center gap-3 flex-wrap">
    <a href="<?php echo e(route('empleado.dashboard')); ?>" class="btn-men">Volver al Menú Principal</a>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\LavaWare\resources\views/empleado/lista_pedidos.blade.php ENDPATH**/ ?>
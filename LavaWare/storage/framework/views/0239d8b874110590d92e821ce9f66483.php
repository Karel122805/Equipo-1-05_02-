

<?php $__env->startSection('content'); ?>
<div class="product-form-container">
    <h2 class="text-center mb-4">Modificar Pedido</h2>

    <form method="POST" action="<?php echo e(route('empleado.pedidos.update', $pedido->id)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="form-group mb-3">
            <label><strong>Nombre del Cliente:</strong></label>
            <input type="text" name="customer_name" value="<?php echo e($pedido->customer_name); ?>" required class="form-control">
        </div>

        <div class="form-group mb-3">
            <label><strong>Fecha:</strong></label>
            <input type="date" name="date" value="<?php echo e($pedido->date); ?>" required class="form-control">
        </div>

        <div class="form-group mb-3">
            <label><strong>Status:</strong></label>
            <select name="status" class="form-control" required>
                <option value="completed" <?php echo e($pedido->status == 'completed' ? 'selected' : ''); ?>>Completado</option>
                <option value="canceled" <?php echo e($pedido->status == 'canceled' ? 'selected' : ''); ?>>Cancelado</option>
            </select>
        </div>

        <div class="d-flex justify-content-between mt-3">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="<?php echo e(route('empleado.pedidos.index')); ?>" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\LavaWare\resources\views/empleado/editar_pedido.blade.php ENDPATH**/ ?>
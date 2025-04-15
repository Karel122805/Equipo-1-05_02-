

<?php $__env->startSection('content'); ?>
<div class="product-form-container" style="max-height: 5500px;">
    <div class="table-scroll-container" style="width: 450px; border-radius: 20px; overflow-y: auto; max-height: 530px">
        <h4 class="text-center mb-4">Registrar Pedido - Autolavado</h4>

        
        <?php if(session('success')): ?>
            <div class="alert alert-success text-center">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        
        <div id="error-total" style="display: none;" class="alert alert-danger text-center">
            El total no puede ser $0.00. Selecciona al menos un elemento.
        </div>

        <form method="POST" action="<?php echo e(route('empleado.pedidos.autolavado.store')); ?>" onsubmit="return validarTotal();">
            <?php echo csrf_field(); ?>

            <div class="form-group mb-3">
                <label><strong>Nombre del Cliente:</strong></label>
                <input type="text" name="customer_name" required class="form-control">
            </div>

            <div class="form-group mb-3">
                <label><strong>Fecha:</strong></label>
                <input type="date" name="date" required class="form-control">
            </div>

            <h5 class="text-center mt-4 mb-3">Selecciona los elementos usados:</h5>

            
            <div class="form-group mb-3">
                <label><u>Lavadoras:</u></label>
                <div class="table-scroll-container" style="max-height: 100px; border: 1px solid #ccc; padding: 8px; border-radius: 10px;">
                    <?php $__currentLoopData = $washers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-check">
                            <input type="checkbox" name="washers[]" class="form-check-input item-check" value="<?php echo e($w->price); ?>" id="washer_<?php echo e($w->id); ?>">
                            <label class="form-check-label" for="washer_<?php echo e($w->id); ?>">Tipo <?php echo e(strtoupper($w->type)); ?> - $<?php echo e(number_format($w->price, 2)); ?></label>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            
            <div class="form-group mb-3">
                <label><u>Secadoras:</u></label>
                <div class="table-scroll-container" style="max-height: 100px; border: 1px solid #ccc; padding: 8px; border-radius: 10px;">
                    <?php $__currentLoopData = $dryers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-check">
                            <input type="checkbox" name="dryers[]" class="form-check-input item-check" value="<?php echo e($d->price); ?>" id="dryer_<?php echo e($d->id); ?>">
                            <label class="form-check-label" for="dryer_<?php echo e($d->id); ?>">Secadora ID #<?php echo e($d->id); ?> - $<?php echo e(number_format($d->price, 2)); ?></label>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            
            <div class="form-group mb-3">
                <label><u>Productos:</u></label>
                <div class="table-scroll-container" style="max-height: 100px; border: 1px solid #ccc; padding: 8px; border-radius: 10px;">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-check">
                            <input type="checkbox" name="products[]" class="form-check-input item-check" value="<?php echo e($p->price); ?>" id="product_<?php echo e($p->id); ?>">
                            <label class="form-check-label" for="product_<?php echo e($p->id); ?>"><?php echo e($p->name); ?> - $<?php echo e(number_format($p->price, 2)); ?></label>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            
            <div class="form-group mt-4 mb-3">
                <label><strong>Total a pagar:</strong></label>
                <input type="text" id="total" name="total" readonly class="form-control" value="0.00">
            </div>

            <input type="hidden" name="service_type" value="auto_lavado">
            <input type="hidden" name="status" value="completed">

            <div class="d-flex justify-content-between mt-4 flex-wrap gap-2">
                <button type="submit" class="btn btn-primary">Registrar</button>
                <a href="<?php echo e(route('empleado.dashboard')); ?>" class="btn-men">Volver al Menú Principal</a>
                <button onclick="window.history.back()" class="btn-reg">Regresar</button>
            </div>

        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const checkboxes = document.querySelectorAll('.item-check');
        const totalField = document.getElementById('total');
        const errorDiv = document.getElementById('error-total');

        function calculateTotal() {
            let total = 0;
            checkboxes.forEach(cb => {
                if (cb.checked) {
                    total += parseFloat(cb.value) || 0;
                }
            });
            totalField.value = total.toFixed(2);

            if (total > 0) {
                errorDiv.style.display = 'none';
            }
        }

        checkboxes.forEach(cb => {
            cb.addEventListener('change', calculateTotal);
        });

        calculateTotal();
    });

    function validarTotal() {
        const total = parseFloat(document.getElementById('total').value);
        const errorDiv = document.getElementById('error-total');

        if (total === 0) {
            errorDiv.style.display = 'block';
            return false;
        }

        return true;
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\LavaWare\resources\views/empleado/autolavado.blade.php ENDPATH**/ ?>
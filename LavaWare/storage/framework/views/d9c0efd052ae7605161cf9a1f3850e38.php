

<?php $__env->startSection('content'); ?>
    <div class="session-history-containerr">
        <h1>Control de Horario de Usuarios</h1>

        
        <form method="GET" action="<?php echo e(route('dueno.sesiones')); ?>" class="session-search-form d-flex justify-content-center gap-4 flex-wrap">
            <div>
                <label for="nombre">Buscar por nombre:</label>
                <input type="text" name="nombre" id="nombre" value="<?php echo e(request('nombre')); ?>" placeholder="Ej. Paula">
            </div>

            <div>
                <label for="fecha">Buscar por fecha (dd/mm/aaaa):</label>
                <input type="text" name="fecha" id="fecha" value="<?php echo e(request('fecha')); ?>" placeholder="22/03/2025">
            </div>

            <div class="align-self-end d-flex gap-2">
                <button type="submit" class="btn btn-primary">Buscar</button>
                <a href="<?php echo e(route('dueno.sesiones')); ?>" class="btn btn-secondary">Limpiar</a>
            </div>
        </form>

        
        <?php
            $buscando = request()->filled('nombre') || request()->filled('fecha');
        ?>

        <div class="<?php echo e($buscando ? '' : 'table-scroll-container'); ?>">
            <table class="session-history-table">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>IP</th>
                        <th>Hora de Entrada</th>
                        <th>Hora de Salida</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $sesiones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sesion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($sesion->user->name); ?></td>
                            <td><?php echo e($sesion->ip_address ?? 'N/A'); ?></td>
                            <td><?php echo e($sesion->login_time ? \Carbon\Carbon::parse($sesion->login_time)->format('d/m/Y H:i:s') : 'No registrada'); ?></td>
                            <td>
                                <?php if($sesion->logout_time): ?>
                                    <?php echo e(\Carbon\Carbon::parse($sesion->logout_time)->format('d/m/Y H:i:s')); ?>

                                <?php else: ?>
                                    <span class="activo">Aún activo</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="4">No hay registros disponibles.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="button-container">
        <a href="<?php echo e(route('dueno.dashboard')); ?>" class="btn-men">Volver al Menú Principal</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\LavaWare\resources\views/dueno/sesiones.blade.php ENDPATH**/ ?>
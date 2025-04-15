<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'LavaWare'); ?></title>
    
    <!-- Enlace al CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo e(asset('favicon.ico')); ?>">
</head>
<body>
    <?php echo $__env->make('layouts.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <main class="main-container">
        <div class="content-box">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </main>

    <?php echo $__env->make('layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\LavaWare\resources\views/layouts/app.blade.php ENDPATH**/ ?>
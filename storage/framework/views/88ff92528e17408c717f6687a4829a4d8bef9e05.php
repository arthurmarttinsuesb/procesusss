<!doctype html>
<html class="no-js" lang="pt">
<?php $__env->startSection('htmlheader'); ?>
<?php echo $__env->make('layouts.partials.htmlheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldSection(); ?>

<body class="sidebar-mini layout-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
        <?php echo $__env->make('layouts.partials.menu_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('layouts.partials.menu_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->yieldContent('conteudo'); ?>

    </div>
    <?php echo $__env->make('layouts.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->startSection('scripts'); ?>
    <?php echo $__env->make('layouts.partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('scripts-adicionais'); ?>
</body>

</html>
<?php /**PATH /var/www/html/processus/resources/views/layouts/app.blade.php ENDPATH**/ ?>
<!DOCTYPE html>
<html>
<?php $__env->startSection('htmlheader'); ?>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Processus - <?php echo $__env->yieldContent('htmlheader_title', 'Your title here'); ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(url('/img/icone-processus.png')); ?>" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo e(asset('plugins/fontawesome-free/css/all.min.css')); ?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="<?php echo e(asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo e(asset('dist/css/adminlte.css')); ?>">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
<?php echo $__env->yieldSection(); ?>

<body class="hold-transition login-page" style="background-image: url('<?php echo e('img/background-processus.png'); ?>');
    background-repeat: no-repeat; background-size: cover; background-position:center center;">
    <?php echo $__env->yieldContent('conteudo'); ?>
    <?php $__env->startSection('scripts'); ?>
        <!-- jQuery -->
        <script src="<?php echo e(asset('plugins/jquery/jquery.min.js')); ?> "></script>
        <!-- Bootstrap 4 -->
        <script src="<?php echo e(asset('plugins/bootstrap/js/bootstrap.bundle.min.js')); ?> "></script>
        <!-- AdminLTE App -->
        <script src="<?php echo e(asset('dist/js/adminlte.min.js')); ?> "></script>
    <?php echo $__env->yieldSection(); ?>
    <?php echo $__env->yieldContent('scripts-adicionais'); ?>
</body>
</html>
<?php /**PATH /var/www/html/processus/resources/views/auth/app.blade.php ENDPATH**/ ?>
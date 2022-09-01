<?php $__env->startSection('htmlheader_title', 'Unidade'); ?>
<?php $__env->startSection('contentheader_title', 'Unidade'); ?>

<?php $__env->startSection('conteudo'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/summernote/summernote.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/iziToast/iziToast.min.css')); ?>">


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h1>Editar Unidade: <?php echo e($secretaria->titulo); ?></h1>
                </div>
                <div class="col-sm-4">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Tela Inicial</a></li>
                        <li class="breadcrumb-item active">Unidade</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <div class=" float-right">
                            
                                <a href="/unidade" class="btn btn-block btn-outline-info "><i class="fa fa-list-alt"></i> Listar Secretarias</a>
                           
                        </div>
                    </div>

                    <?php if(Session::has('message')): ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-ban"></i> Atenção!</h5>
                        <?php echo e(Session::get('message')); ?>

                    </div>
                    <?php endif; ?>
                    <form method="POST" action="/unidade/<?php echo e($secretaria->id); ?>" id="form">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="card-body">
                            (<span style="color: red;">*</span>) Campos Obrigatórios
                            <br><br>
                            <div class="row">
                                <div class="form-group col-6">
                                    <strong>Titulo <span style="color: red;">*</span></strong>
                                    <input value="<?php echo e(old('titulo', $secretaria->titulo)); ?>" type="text" autocomplete="off" id="titulo" name="titulo" class="form-control <?php $__errorArgs = ['titulo', 'secretaria'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <?php $__errorArgs = ['titulo','secretaria'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-6">
                                    <strong>Sigla <span style="color: red;">*</span></strong>
                                    <input value="<?php echo e(old('sigla', $secretaria->sigla)); ?>" type="text" autocomplete="off" id="sigla" name="sigla" class="form-control <?php $__errorArgs = ['sigla', 'secretaria'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <?php $__errorArgs = ['sigla','secretaria'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>


                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="card-footer">
                <button type="submit" form="form" class="btn btn-info float-right salvar" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>
                    &nbsp Aguarde...">Salvar</button>
                    <!-- /.card-footer -->
                </div>
            <!-- /.card -->
        </div>
</div>
</section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/processus/resources/views/secretaria/edit.blade.php ENDPATH**/ ?>
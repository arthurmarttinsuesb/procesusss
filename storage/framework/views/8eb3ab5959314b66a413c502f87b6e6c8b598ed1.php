

 <?php $__env->startSection('htmlheader_title', 'Alterar Meu Modelo'); ?>
 <?php $__env->startSection('contentheader_title', 'Alterar Meu Modelo'); ?>

 <?php $__env->startSection('conteudo'); ?>
  <link rel="stylesheet" href="<?php echo e(asset('plugins/summernote/summernote-bs4.css')); ?>">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Alterar Meu Modelo de Documento</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Tela Inicial</a></li>
              <li class="breadcrumb-item active">Meus Modelos</li>
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
                        <a href="/meu-modelo" class="btn btn-block btn-outline-info "><i class="fa fa-list-alt"></i> Listar Modelos</a>
                    </div>
                </div>
              <?php if(Session::has('message')): ?>
              <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Atenção!</h5>
                     <?php echo e(Session::get('message')); ?>

                </div>
              <?php endif; ?>
              <form  method="POST" id="form" action="/meu-modelo/<?php echo e($modelo->id); ?>">
                 <?php echo csrf_field(); ?>
                 <?php echo method_field('PUT'); ?>
                <div class="card-body">
                      (<span style="color: red;">*</span>) Campos Obrigatórios
                      <br><br>
                       <div class="row">
                            <div class="form-group col-12">
                                <strong>Titulo <span style="color: red;">*</span></strong>
                                <input type="text" autocomplete="off" id="titulo" name="titulo" class="form-control <?php $__errorArgs = ['titulo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($modelo->titulo); ?>">
                                <?php $__errorArgs = ['titulo'];
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
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <strong>Conteúdo <span style="color: red;">*</span></strong>
                                <textarea class="textarea form-control <?php $__errorArgs = ['conteudo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name='conteudo' id='conteudo' placeholder="Place some text here"
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo e($modelo->conteudo); ?></textarea>
                                    <?php $__errorArgs = ['conteudo'];
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
                            <input type='hidden' id='id' value='<?php echo e($modelo->id); ?>'>
                        </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info float-right" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>
                    &nbsp Aguarde...">Salvar</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->

          </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-adicionais'); ?>
<script src="<?php echo e(asset('plugins/summernote/summernote-bs4.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/base.js')); ?>"></script>
<script src="<?php echo e(asset('js/meu_modelo_documento.js')); ?>"></script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/processus/resources/views/MeuModelo/edit.blade.php ENDPATH**/ ?>
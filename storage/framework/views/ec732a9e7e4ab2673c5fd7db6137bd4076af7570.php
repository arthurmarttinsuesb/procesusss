<?php $__env->startSection('htmlheader_title', 'Encaminhamento'); ?>
<?php $__env->startSection('contentheader_title', 'Encaminhamento'); ?>
<?php $__env->startSection('conteudo'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/select2/css/select2.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')); ?>">

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-8">
          <h1>Encaminhar Processo nº <?php echo e($processo->numero); ?> </h1>
        </div>
        <div class="col-sm-4">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
            <li class="breadcrumb-item active">Encaminhamento</li>
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
            <div class="float-right">
              <a href="/processo/<?php echo e($processo->numero); ?>/edit" class="btn btn-block btn-outline-info "><i class="fa fa-undo-alt"></i> Retornar ao Processo</a>
            </div>
          </div>
          <?php if(Session::has('message')): ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Atenção!</h5>
            <?php echo e(Session::get('message')); ?>

          </div>
          <?php endif; ?>

          <form method="POST" id="tramite">
            <?php echo csrf_field(); ?>
            <div class="card-body">
              (<span style="color: red;">*</span>) Campos Obrigatórios
              <br><br>
              <div class="row">
                <div class="form-group col-md-6">

                  <input type="hidden" name="processo" id="processo" value='<?php echo e($processo->numero); ?>'>
                  <input type="hidden" name="tramitacao" value="<?php echo e($tramite->id ?? ''); ?>">

                  <!-- select_secretaria -->
                  <strong> Secretaria <span style="color: red;">*</span></strong>
                    <select class="form-control select2 form-control <?php $__errorArgs = ['fk_sect', 'usuario-setor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="fk_sect" id="fk_sect">
                        <option value=" ">Selecione</option>
                      <?php $__currentLoopData = $secretarias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $secretaria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($secretaria->id); ?>"><?php echo e($secretaria->titulo); ?> - <?php echo e($secretaria->sigla); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  <?php $__errorArgs = ['fk_setor','usuario-setor'];
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

                  <!-- <select id="select_secretaria" class="form-control select2 <?php $__errorArgs = ['fk_setor', 'setor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="fk_setor">
                    <option value="selecione" selected>Selecione</option>
                    <?php $__currentLoopData = $secretarias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $secretaria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $setores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($secretaria->id == $setor->fk_secretaria): ?>
                    <?php if(old('fk_setor') == $setor->id): ?>

                    <option value="<?php echo e($setor->id); ?>" selected><?php echo e($secretaria->sigla); ?> - <?php echo e($setor->titulo); ?></option>

                    <?php else: ?>
                    <option value="<?php echo e($setor->id); ?>"><?php echo e($secretaria->sigla); ?> - <?php echo e($setor->titulo); ?></option>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <?php $__errorArgs = ['fk_setor','setor'];
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
unset($__errorArgs, $__bag); ?> -->
                </div>

                <div class="form-group col-md-6">
                  <strong>Setor <span style="color: red;">*</span></strong>
                  <select class="form-control select2 form-control <?php $__errorArgs = ['fk_setor', 'setor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="fk_setor" id="select_secretaria">
                  </select>
                  <?php $__errorArgs = ['fk_setor','setor'];
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

                <!-- verifico se o tipo de usuário é cidadão, se for o campo do tipo usuário não vai ser mostrado-->
                <div hidden class="form-group col-md-4" <?php if(auth()->check() && auth()->user()->hasRole('cidadao')): ?>  hidden <?php endif; ?>>
                  <strong>Usuario <span style="color: red;">*</span></strong>
                  <select id="select_user" class="form-control select2 <?php $__errorArgs = ['fk_user', 'setor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="fk_user">
                         <option value="selecione" selected>Selecione</option>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($user->id); ?>"  <?php if(old('fk_user') == $user->id): ?> selected <?php endif; ?>><?php echo e($user->nome); ?> </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <?php $__errorArgs = ['fk_user','setor'];
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

                <!-- verifico se o tipo de usuário é cidadão, se for o campo do tipo usuário não vai ser mostrado-->
                <div class="form-group col-md-12"  <?php if(auth()->check() && auth()->user()->hasRole('cidadao')): ?>  hidden <?php endif; ?>>
                  <strong>Instrução <span style="color: red;">*</span></strong>
                  <textarea type="text" rows='5' autocomplete="off" id="instrucao" name="instrucao" class="form-control <?php $__errorArgs = ['instrucao'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e(old('instrucao')); ?></textarea>
                    <?php $__errorArgs = ['instrucao'];
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
            </div>
            <!-- se o processo estiber bloqueado não pode alterar mais nada -->
            <div class="card-footer">
                        <button type="button" form="tramite" class="btn btn-info float-right add_tramite" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>
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
<script type="text/javascript">
  $(document).on('change', '#fk_sect', function() {
    var secretaria = $("#fk_sect option:selected").val();
    // console.log(secretaria);
    var option = "";
    $.getJSON("/selecionar-setor/" + secretaria, function(dados) {
      //Atibuindo valores à variavel com os dados da consulta
      option += '<option value="">Selecione</option>';
      $.each(dados.setores, function(i, setor) {
        option +=
          '<option value="' +
          setor.id +
          '" >' +
          setor.titulo +
          "</option>";
      });
      //passando para o select de cidades
      // console.log(option);
      $("#select_secretaria").html(option).show();

    });
  });
</script>
<script src="<?php echo e(asset('plugins/select2/js/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/base.js')); ?>"></script>
<script src="<?php echo e(asset('js/processo_tramitacao.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/processus/resources/views/processo/tramite/create.blade.php ENDPATH**/ ?>
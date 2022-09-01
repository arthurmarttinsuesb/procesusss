<?php $__env->startSection('htmlheader_title', 'Colaboradores'); ?>
<?php $__env->startSection('contentheader_title', 'Colaboradores'); ?>

<link rel="stylesheet" href="<?php echo e(asset('plugins/select2/css/select2.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')); ?>">

<?php $__env->startSection('conteudo'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Adicionar Colaborador</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Tela Inicial</a></li>
                        <li class="breadcrumb-item active">Colaboradores</li>
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
                            <a href="<?php echo e(URL::to('usuario-setor')); ?>" class="btn btn-block btn-outline-info ">
                                <i class="fa fa-list-alt"></i> Listar Colaboradores
                            </a>
                        </div>
                    </div>

                    <?php if(Session::has('message')): ?>
                    <div class="alert alert-danger alert-dismissible m-2">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-ban"></i> Atenção!</h5>
                        <?php echo e(Session::get('message')); ?>

                    </div>
                    <?php endif; ?>
                    <div class="card-body">
                        <form method="POST" action="/usuario-setor" id="usuario-setor">
                            <?php echo csrf_field(); ?>
                            (<span style="color: red;">*</span>) Campos Obrigatórios
                            <br><br>

                            <div class="row">
                                <div class="form-group col-xl-4 col-sm-4">
                                    <strong>Usuario <span style="color: red;">*</span></strong>
                                    <select class="form-control select2 form-control <?php $__errorArgs = ['fk_user', 'usuario-setor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="fk_user">

                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(old('fk_user') == $user->id): ?>
                                        <option value="<?php echo e($user->id); ?>" selected><?php echo e($user->nome); ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo e($user->id); ?>"><?php echo e($user->nome); ?></option>
                                        <?php endif; ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['fk_user','usuario-setor'];
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
                                <div class="form-group col-xl-4 col-sm-4">
                                    <strong> Secretaria <span style="color: red;">*</span></strong>
                                    <select class="form-control select2 form-control <?php $__errorArgs = ['fk_sect', 'usuario-setor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="fk_sect" id="fk_sect">
                                        <option value="">Selecione</option>
                                        <?php $__currentLoopData = $secretarias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $secretaria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($secretaria->id); ?>"><?php echo e($secretaria->sigla); ?></option>
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
                                </div>
                                <div class="form-group col-xl-4 col-sm-4">
                                    <strong>Setor <span style="color: red;">*</span></strong>
                                    <select class="form-control select2 form-control <?php $__errorArgs = ['fk_setor', 'usuario-setor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="fk_setor" id = "fk_setor">

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
                                </div>
                                <div class="form-group col-xl-2 col-sm-2">
                                    <strong>Tipo de Usuário <span style="color: red;">*</span></strong>
                                    <select name="tipo" class="form-control select2 form-control <?php $__errorArgs = ['tipo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <option value="">Selecione</option>
                                        <option value="administrador">Administrador</option>
                                        <option value="colaborador-nivel-1">Colaborador Nível 1</option>
                                        <option value="colaborador-nivel-2">Colaborador Nível 2</option>
                                    </select>
                                    <?php $__errorArgs = ['tipo'];
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
                                <div class="form-group col-xl-2 col-sm-2">
                                    <strong>Data Entrada <span style="color: red;">*</span></strong>
                                    <input type="text" autocomplete="off" id="data_entrada" name="data_entrada" class="form-control <?php $__errorArgs = ['data_entrada', 'usuario-setor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('data_entrada', date('d/m/Y'))); ?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false">
                                    <?php $__errorArgs = ['data_entrada','usuario-setor'];
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

                            <!-- /.card-body -->
                        </form>
                    </div>
                    <div class="card-footer">
                        <button type="submit" form="usuario-setor" class="btn btn-info float-right" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>
                    &nbsp Aguarde...">Salvar</button>
                    </div>
                    <!-- /.card-footer -->

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
            console.log(option);
            $("#fk_setor").html(option).show();

        });
    });
</script>
<script src="<?php echo e(asset('plugins/select2/js/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/inputmask/min/jquery.inputmask.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/usuario-setor.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/processus/resources/views/usuarioSetor/create.blade.php ENDPATH**/ ?>
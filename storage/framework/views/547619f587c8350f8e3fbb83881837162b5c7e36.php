<?php $__env->startSection('htmlheader_title', 'Usuários do Sistema'); ?>
<?php $__env->startSection('contentheader_title', 'Usuários do Sistema'); ?>

<link rel="stylesheet" href="<?php echo e(asset('plugins/select2/css/select2.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')); ?>">

<?php $__env->startSection('conteudo'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Alterar Usuário</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Tela Inicial</a></li>
                        <li class="breadcrumb-item active">Usuarios do Sistema</li>
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
                                <a href="<?php echo e(URL::to('usuarios')); ?>" class="btn btn-block btn-outline-info "><i
                                    class="fa fa-list-alt"></i>Listar Usuarios</a>
                            
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
                        <form method="POST" action="/usuarios/<?php echo e($usuarios->id); ?>" id="usuarios">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            (<span style="color: red;">*</span>) Campos Obrigatórios
                            <br><br>

                            <div class="row">
                                <div class="form-group col-12">
                                    <strong>Usuário<span style="color: red;">*</span></strong>
                                    <input type="text" autocomplete="off" id="nome" name="nome" class="form-control <?php $__errorArgs = ['nome'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($usuarios->nome); ?>">
                                    <?php $__errorArgs = ['nome'];
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
                            
                                
                                <div class="form-group col-xl-4 col-sm-4">
                                    <strong>Tipo de Usuário <span style="color: red;">*</span></strong>
                                    <select
                                        class="form-control select2 form-control <?php $__errorArgs = ['tipo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        name="tipo">
                                        <option value="">Selecione</option>
                                        <option value="administrador" <?php if("administrador"==$usuarios->getRoleNames()->implode(', ') ): ?> Selected <?php endif; ?>>Administrador</option>
                                        <option value="colaborador-nivel-2" <?php if("colaborador-nivel-2"==$usuarios->getRoleNames()->implode(', ') ): ?> Selected <?php endif; ?>>Colaborador Nível 2</option>
                                        <option value="colaborador-nivel-1" <?php if("colaborador-nivel-1"==$usuarios->getRoleNames()->implode(', ') ): ?> Selected <?php endif; ?>>Colaborador Nível 1</option>
                                        <option value="cidadao" <?php if("cidadao"==$usuarios->getRoleNames()->implode(', ') ): ?> Selected <?php endif; ?>>Cidadão</option>
    
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
                                <div class="row">
                                    <div class="form-group col-12">
                                        <strong>Email<span style="color: red;">*</span></strong>
                                        <input type="text" autocomplete="off" id="email" name="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($usuarios->email); ?>">
                                        <?php $__errorArgs = ['email'];
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
                                        <strong>Telefone<span style="color: red;">*</span></strong>
                                        <input type="text" autocomplete="off" id="telefone" name="telefone" class="form-control <?php $__errorArgs = ['telefone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($usuarios->telefone); ?>">
                                        <?php $__errorArgs = ['telefone'];
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
                            <!-- /.card-body -->
                        </form>
                    </div>
                    <div class="card-footer">
                        <button type="submit" form="usuarios" class="btn btn-info float-right" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>
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
<script src="<?php echo e(asset('plugins/select2/js/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/inputmask/min/jquery.inputmask.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/usuarios.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/processus/resources/views/usuariosSistema/edit.blade.php ENDPATH**/ ?>
<?php $__env->startSection('htmlheader_title', 'Liberar Acesso'); ?>
<?php $__env->startSection('contentheader_title', 'Liberar Acesso'); ?>

<?php $__env->startSection('conteudo'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/select2/css/select2.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')); ?>">


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Informações do Cidadão</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Tela Inicial</a></li>
                        <li class="breadcrumb-item active">Informações do Cidadão</li>
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
                            <a href="<?php echo e(URL::to('/ativar-usuarios')); ?>" class="btn btn-block btn-outline-info "><i class="fa fa-undo-alt"></i> Retornar para listagem</a>
                        </div>
                    </div>
                        <?php if(Session::has('message')): ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-ban"></i> Atenção!</h5>
                                <?php echo e(Session::get('message')); ?>

                            </div>
                        <?php endif; ?>
                    <form action="/ativar-usuarios/ativar/<?php echo e($modelo->slug); ?>" method="post" id="liberar">
                        <?php echo csrf_field(); ?>
                        <div class="card-body">
                        <div class="row">
                            <div class="form-group col-8">
                                <label>Nome:</label>
                                <input type="text" class="form-control" value="<?php echo e(mb_strtoupper($modelo->nome,'UTF8')); ?>" />
                            </div>
                            <div class="form-group col-4">
                                <label>Data de Nascimento:</label>
                                <input type="text" class="form-control" value="<?php echo e(date('d/m/Y', strtotime($modelo->nascimento))); ?>" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-3 sexo hidden">
                                <label>Gênero:</label>
                                <input type="text" class="form-control" value="<?php echo e(mb_strtoupper($modelo->sexo,'UTF8')); ?>" />
                            </div>
                            <div class=" form-group col-3">
                                <label>Tipo:</label>
                                <input type="text" class="form-control" value="<?php echo e(mb_strtoupper($modelo->tipo,'UTF8')); ?>" />
                               
                            </div>
                            <div class="form-group col-3">
                                <div class="form-group cpf">
                                    <label>CPF/CNPJ:</label>
                                    <input type="text" class="form-control" value="<?php echo e(mb_strtoupper($modelo->cpf_cnpj ,'UTF8')); ?>" />
                                </div>
                            </div>
                            <div class="form-group col-3">
                                <div class="form-group cpf">
                                    <label>Telefone:</label>
                                    <input type="text" class="form-control" value="<?php echo e(mb_strtoupper($modelo->telefone,'UTF8')); ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-3">
                                <label>Estado:</label>
                                <input type="text" class="form-control" value="<?php echo e(mb_strtoupper($modelo->estado->nome,'UTF8')); ?>" />
                               
                            </div>
                            <div class="form-group col-3">
                                <label>Cidade:</label>
                                <input type="text" class="form-control" value="<?php echo e(mb_strtoupper($modelo->cidade->nome,'UTF8')); ?>" />
                            </div>
                            <div class="form-group col-6">
                                <label>Rua/Avenida:</label>
                                <input type="text" class="form-control" value="<?php echo e(mb_strtoupper($modelo->logradouro, 'UTF8')); ?>" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-2">
                                <label>Número:</label>
                                <input type="text" class="form-control"  value="<?php echo e(mb_strtoupper($modelo->numero,'UTF8')); ?>" />
                            </div>
                            <div class="form-group col-4">
                                <label>Bairro:</label>
                                <input type="text" class="form-control" value="<?php echo e(mb_strtoupper($modelo->bairro,'UTF8')); ?>" />
                            </div>
                            <div class="form-group col-2">
                                <label>CEP:</label>
                                <input type="text" class="form-control" value="<?php echo e(mb_strtoupper($modelo->cep,'UTF8')); ?>"/>
                            </div>
                            <div class="form-group col-4">
                                <label>Complemento:</label>
                                <input type="text" class="form-control" value="<?php echo e(mb_strtoupper($modelo->complemento,'UTF8')); ?>" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-4">
                                <label>E-mail:</label>
                                <input type="text" class="form-control" value="<?php echo e(mb_strtoupper($modelo->email,'UTF8')); ?>" />
                            </div>
                        </div>
                        </div>
                        <div class="card-footer">
                            <?php if($modelo->status=="Inativo"): ?>
                                <button type="submit" form="liberar" class="btn btn-success float-right"><i class="fas fa-unlock-alt"></i> Liberar Acesso</button>                          
                            <?php endif; ?>
                            <!-- /.card-footer -->
                        </div>
                    </form>

                    <!-- /.card-body -->
                </div>


                <!-- /.card -->
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-adicionais'); ?>
<script src="<?php echo e(asset('plugins/select2/js/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/inputmask/jquery.inputmask.js')); ?>"></script>
<script src="<?php echo e(asset('js/base.js')); ?>"></script>
<script src="<?php echo e(asset('js/register.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/processus/resources/views/ativarUsuarios/visualizar_dados.blade.php ENDPATH**/ ?>
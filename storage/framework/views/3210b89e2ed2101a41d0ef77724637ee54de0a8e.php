<?php $__env->startSection('htmlheader_title', 'Minha conta'); ?>
<?php $__env->startSection('contentheader_title', 'Minha conta'); ?>

<?php $__env->startSection('conteudo'); ?>
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Minha Conta</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Tela Inicial</a></li>
                        <li class="breadcrumb-item active">Minha conta</li>
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
                    <?php if(Session::has('message')): ?>
                    <div class="alert alert-info m-2"><?php echo e(Session::get('message')); ?></div>
                    <?php endif; ?>
                    
                    <div class="card-body">
                    <div class="row">
                        <div class="form-group col-8">
                            <label>Nome: </label> 
                            <input type="text" class="form-control" value="<?php echo e($usuario->nome); ?>" disabled/>
                        </div>
                        <div class="form-group col-4">
                            <label >Data de nascimento: </label> 
                            <input type="text" class="form-control" value="<?php echo e(date('d/m/Y', strtotime($usuario->nascimento))); ?>" disabled/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-4">
                            <label>Email: </label>
                             <input type="text" class="form-control"  value="<?php echo e($usuario->email); ?>"  disabled/>
                        </div>
                        <div class="form-group col-4">
                        <label >Gênero: </label>
                         <input type="text" class="form-control"  value="<?php echo e($usuario->sexo); ?>" disabled/>
                        </div>
                        <?php if("administrador"==$usuario->getRoleNames()->implode(', ') ): ?>
                        <div class="form-group col-4">
                            <label >Tipo: </label>
                             <input type="text" class="form-control" value=" Administrador" disabled/>
                        </div>
                        <?php endif; ?>
                        <?php if("colaborador-nivel-2"==$usuario->getRoleNames()->implode(', ') ): ?>
                            <div  class="form-group col-4">
                                <label >Tipo: </label>
                                 <input type="text" class="form-control" value="Colaborador-nivel-2" disabled/>
                            </div>
                        <?php endif; ?>
                        <?php if("colaborador-nivel-1"==$usuario->getRoleNames()->implode(', ') ): ?>
                            <div  class="form-group col-4">
                                <label>Tipo: </label> 
                                <input type="text" class="form-control" value="Colaborador-nivel-1" disabled/>
                            </div>
                        <?php endif; ?>
                        <?php if("cidadao"==$usuario->getRoleNames()->implode(', ') ): ?>
                            <div class="form-group col-4">
                                <label >Tipo: </label>
                                <input type="text" class="form-control" value="Cidadao" disabled/>
                            </div>
                         <?php endif; ?>
                    </div>
                    <div class="row">
                         <div class="form-group col-4">
                            <label>CPF/CPNJ: </label> <input type="text"  class="form-control"  value="<?php echo e($usuario->cpf_cnpj); ?>" disabled/>
                        </div>
                         <div class="form-group col-4">
                            <label>Telefone: </label>
                             <input type="text" class="form-control"  value="<?php echo e($usuario->telefone); ?>" disabled/>
                        </div>
                         <div class="form-group col-4">
                            <label >Estado: </label>
                            <input type="text" class="form-control"  value="<?php echo e($usuario->estado->nome); ?>" disabled/>
                        </div>
                    </div>
                    <div class="row">
                         <div class="form-group col-4">
                            <label >Cidade: </label>
                            <input type="text" class="form-control"  value="<?php echo e($usuario->cidade->nome); ?>" disabled/>
                        </div>
                     
                         <div class="form-group col-8">
                            <label>Rua/Avenida: </label> 
                            <input type="text" class="form-control" value="<?php echo e($usuario->logradouro); ?>" disabled/>
                        </div>
                    </div>
                    <div class="row">
                         <div class="form-group col-4">
                            <label>Numero: </label> 
                            <input type="text" class="form-control"   value="<?php echo e($usuario->numero); ?>" disabled/>
                        </div>
                    
                    
                         <div class="form-group col-4">
                            <label >Bairro: </label> 
                            <input type="text" class="form-control"   value="<?php echo e($usuario->bairro); ?>" disabled/>
                        </div>
                     
                     
                         <div class="form-group col-4">
                            <label >CEP: </label>
                            <input type="text" class="form-control"  value="<?php echo e($usuario->cep); ?>" disabled/>
                        </div>
                    </div>
                    <div class="row">
                         <div class="form-group col-4">
                            <label>Complemento: </label>
                            <input type="text" class="form-control"  value="<?php echo e($usuario->complemento); ?>" disabled/>
                        </div>
                    </div>
                    
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <!-- /.row -->
    </section>
</div>
<!-- /.content -->
<!-- jQuery!-->
<script src="<?php echo e(asset('plugins/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/base.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/processus/resources/views/minhaConta/index.blade.php ENDPATH**/ ?>
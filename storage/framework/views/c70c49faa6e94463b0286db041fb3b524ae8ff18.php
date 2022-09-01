<?php $__env->startSection('htmlheader_title', 'Processo'); ?>
<?php $__env->startSection('contentheader_title', 'Processo'); ?>

<?php $__env->startSection('conteudo'); ?>
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">

<!-- <style>
    .float-right button {
        background-color: #fff;
    }
    .float-right button:hover {
        background-color: #17a2b8;
    }
</style> -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gerenciar Meus Processos</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Tela Inicial</a></li>
                        <li class="breadcrumb-item active">Processos</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <?php if(Session::has('message')): ?>
                <div class="alert alert-info m-2"><?php echo e(Session::get('message')); ?></div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-xl-6 col-sm-9">
                            </div>
                            <div class="col-xl-6 col-sm-6" style="display: flex;">
                                    <button data-toggle="modal" data-target="#modal-processo" class="btn btn-block btn-outline-info"><i class="fa fa-plus"></i> Adicionar Processo</button>
                                    <button data-toggle="modal" data-target="#modal_replicar_processo" class="btn btn-block btn-outline-info" style="margin: 0 auto 0 10px;"><i class="fa fa-plus"></i> Replicar Processo</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive-sm">
                        <?php if(Auth::user()->hasRole('administrador')): ?>
                        <table id="table_administrador" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Criado Por</th>
                                    <th>Número Processo</th>
                                    <th>Data de Abertura</th>
                                    <th>Tipo</th>
                                    <th>Status</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                        </table>
                        <?php else: ?>
                        <table id="table_usuario" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Número Processo</th>
                                    <th>Data de Abertura</th>
                                    <th>Tipo</th>
                                    <th>Status</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                        </table>

                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
            <!-- /.row -->
    </section>
</div>
<?php echo $__env->make('processo.modal_processo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('processo.modal_replicar_processo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- /.content -->
<!-- jQuery -->
<script src="<?php echo e(asset('plugins/jquery/jquery.min.js')); ?>"></script>

<script src="<?php echo e(asset('plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/base.js')); ?>"></script>
<script src="<?php echo e(asset('js/listar_processo.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/processus/resources/views/processo/index.blade.php ENDPATH**/ ?>
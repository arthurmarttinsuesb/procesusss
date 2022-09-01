<?php $__env->startSection('htmlheader_title', 'Home'); ?>
<?php $__env->startSection('contentheader_title', 'Home'); ?>
<?php $__env->startSection('conteudo'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
           
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Inicio</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Tela Inicial</a></li>
                        <li class="breadcrumb-item active">Inicio</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <!-- Main content -->
            <div class="container-fluid">
                <?php if(auth()->user()->status != 'Ativo'): ?>
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Aguardando Liberação</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            Atenção, a sua conta está passando por uma avaliação pelos nossos colaboradores, em breve estaremos liberando o seu acesso.
                        </div>
                        <!-- /.card-body -->
                    </div>
                <?php else: ?>
                    <div class="row">
                        <div class="col-md-12">
                                <div class="alert alert-info alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-info"></i> Olá!</h5>Seja bem vindo ao sistema processus.
                                </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
    </section>           
                   
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/processus/resources/views/home_cidadao.blade.php ENDPATH**/ ?>
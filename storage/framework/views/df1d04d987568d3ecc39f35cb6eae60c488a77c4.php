<?php $__env->startSection('htmlheader_title', 'Home'); ?>
<?php $__env->startSection('contentheader_title', 'Home'); ?>

<?php $__env->startSection('conteudo'); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="wrapper">
        <?php echo $__env->make('manual.colaborador.colaborador_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manual do Colaborador</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/home">Tela Inicial</a></li>
                            <li class="breadcrumb-item active">Manual</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    
        <!-- Main content -->
        <section class="content">
            <!-- Main content -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                            <div class="alert alert-info alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-info"></i> Olá!</h5>Este é o seu manual que irá lhe auxiliar a utilizar nossa plataforma.
                            </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <h5>Na Tela Inicial você tem disponíveis os menus do cidadão e do colaborador.</h5>
                <br>
                <h5>Também é possível ver as atualizações	que aconteceram em seus processos ou documentos em “Processos Recebidos” e também é possível ver processos encaminhados para o seu setor em “Documentos Recebidos”.</h5>
                <br>
                <div class="filter-container p-0 row">
                    <div class="filtr-item col-sm-12" data-category="1" data-sort="white sample">
                        <div class="row mb-12">
                            <div class="col-sm-12">
                                <img class="img-fluid" src="<?php echo e(asset('dist/img/home-colaborador.png')); ?>" alt="Photo">
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                </div>
                <br>
                <h5>Se você tiver notificações pendentes elas serão mostradas da seguinte maneira:</h5>
                <br>
                <div class="filter-container p-0 row">
                    <div class="filtr-item col-sm-12" data-category="1" data-sort="white sample">
                        <div class="row mb-12">
                            <div class="col-sm-12">
                                <img class="img-fluid" src="<?php echo e(asset('dist/img/home-notificacao.png')); ?>" alt="Photo">
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                </div>
                <br>
                <h5>Sendo possível clicar para fazer a assinatura do documento, visualizar os detalhes do processo e também, se necessário, informar erros ao cidadão que criou o processo.</h5>
                <br>
            </div>
        </section>
    </div>
                   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/processus/resources/views/manual/colaborador/colaborador.blade.php ENDPATH**/ ?>
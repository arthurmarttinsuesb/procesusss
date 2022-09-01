<?php $__env->startSection('htmlheader_title', 'Home'); ?>
<?php $__env->startSection('contentheader_title', 'Home'); ?>

<?php $__env->startSection('conteudo'); ?>
    <div class="wrapper">
        <?php echo $__env->make('manual.administrador.administrador_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manual do Administrador</h1>
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
                                    <h5><i class="icon fas fa-info"></i> Colaboradores</h5>
                                </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <h5>Ao clicar em <strong>“Colaboradores”</strong> você verá toda a lista de colaboradores ativos.</h5>
                    <br>
                    <div class="filtr-item col-sm-12" data-category="1" data-sort="white sample">
                        <div class="row mb-12">
                            <div class="col-sm-12">
                                <img class="img-fluid" src="<?php echo e(asset('dist/img/list-colaboradores.png')); ?>" alt="Photo">
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                    <br>
                    <h5>É possível clicar em “Adicionar Colaboradores” e designá-los a secretarias e setores cadastrados.</h5>
                    <br>
                    <div class="filtr-item col-sm-12" data-category="1" data-sort="white sample">
                        <div class="row mb-12">
                            <div class="col-sm-12">
                                <img class="img-fluid" src="<?php echo e(asset('dist/img/add-colaborador.png')); ?>" alt="Photo">
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                    <br>
                    <h5>Também é possível clicar em <strong><i class="icon fas fa-edit"></i> (editar)</strong> e alterar o tipo de usuário, ou o seu setor, alterando também a sua data de entrada no novo setor ou com um novo cargo.</h5>
                    <br>
                    <div class="filtr-item col-sm-12" data-category="1" data-sort="white sample">
                        <div class="row mb-12">
                            <div class="col-sm-12">
                                <img class="img-fluid" src="<?php echo e(asset('dist/img/edit-colaborador.png')); ?>" alt="Photo">
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                    <br>
                    <h5>Se for alterar o tipo do usuário, você deverá escolher entre funcionário e administrador</h5>
                    <br>
                    <div class="filtr-item col-sm-12" data-category="1" data-sort="white sample">
                        <div class="row mb-12">
                            <div class="col-sm-12">
                                <img class="img-fluid" src="<?php echo e(asset('dist/img/edit-tipo.png')); ?>" alt="Photo">
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                    <br>
                    <h5>Se o que deseja fazer é retirar o usuário do setor, na lista de colaboradores clique em (excluir) e faça a confirmação necessária clicando em “Sim, quero excluir!”</h5>
                    <br>
                    <div class="filtr-item col-sm-6" data-category="1" data-sort="white sample">
                        <div class="row mb-6">
                            <div class="col-sm-6">
                                <img class="img-fluid" src="<?php echo e(asset('dist/img/excluir-colaborador.png')); ?>" alt="Photo">
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                    <br>
                </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/processus/resources/views/manual/administrador/colaboradores.blade.php ENDPATH**/ ?>
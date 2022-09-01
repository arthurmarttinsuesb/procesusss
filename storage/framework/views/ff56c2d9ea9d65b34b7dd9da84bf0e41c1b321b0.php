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
                                    <h5><i class="icon fas fa-info"></i> Usuários do Sistema</h5>
                                </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <h5>Clicando em <strong>“Usuários do Sistema”</strong> você verá toda a lista de usuários cadastrados, incluindo cidadãos, colaboradores e outros administradores.</h5>
                    <br>
                    <div class="filtr-item col-sm-12" data-category="1" data-sort="white sample">
                        <div class="row mb-12">
                            <div class="col-sm-12">
                                <img class="img-fluid" src="<?php echo e(asset('dist/img/usuarios.png')); ?>" alt="Photo">
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                    <br>
                    <h5>É seu direito no uso do sistema, ativar usuários, fazer a ligação entre ele e setores para assim ele ter acesso como colaborador no sistema ou também dar acesso de administrador a eles.</h5>
                    <br>
                    <h5>Para isso clique no usuário que deseja ativar e designe a ele um tipo (funcionário ou administrador), um setor para o qual ele trabalha e sua data de entrada.</h5>
                    <br>
                </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/processus/resources/views/manual/administrador/usuarios.blade.php ENDPATH**/ ?>
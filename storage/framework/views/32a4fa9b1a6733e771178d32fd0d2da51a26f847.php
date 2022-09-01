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
                                    <h5><i class="icon fas fa-info"></i> Encaminhar Processo</h5>
                                </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <h5>Seu processo pode ser encaminhado aos cidadãos diretamente pela plataforma.</h5>
                    <br>
                    <div class="filtr-item col-sm-12" data-category="1" data-sort="white sample">
                        <div class="row mb-12">
                            <div class="col-sm-12">
                                <img class="img-fluid" src="<?php echo e(asset('dist/img/encaminhar-colabolador.png')); ?>" alt="Photo">
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                    <br>
                    <h5>Se os trâmites do processo já acabaram e ele pode retornar ao cidadão, clique em “Encerrar o Processo” e relate a justificativa de estar encerrando o processo, para que o cidadão entenda o estado do seu documento.</h5>
                    <br>
                    <div class="filtr-item col-sm-12" data-category="1" data-sort="white sample">
                        <div class="row mb-12">
                            <div class="col-sm-12">
                                <img class="img-fluid" src="<?php echo e(asset('dist/img/justificativa.png')); ?>" alt="Photo">
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                    <br>
                    <h5>Se já estiver tudo certo com o documento e ele pode seguir para o próximo passo, clique em <strong>“Encaminhar processo”</strong> e em seguida em <strong>“Adicionar Encaminhamento”</strong>.</h5>
                    <h5>Selecione o setor e o usuário para o qual deseja fazer o encaminhamento, escreva a instrução necessária para auxiliar o destinatário a entender o estado do processo em questão e clique em <strong>“Salvar”</strong> que está ao lado direito.</h5>
                    <br>
                    <div class="filtr-item col-sm-12" data-category="1" data-sort="white sample">
                        <div class="row mb-12">
                            <div class="col-sm-12">
                                <img class="img-fluid" src="<?php echo e(asset('dist/img/enviar-colab-descricao.png')); ?>" alt="Photo">
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                    <br>
                    <h5><strong>OBS.:</strong> É necessário que você tenha pelo menos um documento criado ou que tenha sido enviado a você para que o encaminhamento possa acontecer. </h5>
                </div>
        </section>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/processus/resources/views/manual/administrador/encaminhar_adm.blade.php ENDPATH**/ ?>
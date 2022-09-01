<?php $__env->startSection('htmlheader_title', 'Processo'); ?>
<?php $__env->startSection('contentheader_title', 'Processo'); ?>

<?php $__env->startSection('conteudo'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/jquery-ui/jquery-ui.min.css')); ?>">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Meu Processo nº: <?php echo e($processo->numero); ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Tela Inicial</a></li>
                        <li class="breadcrumb-item active">Processos</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">

            <div class="col-md-12">
            <?php if(Session::has('message_sucesso')): ?>
                <div class="alert alert-info alert-dismissible col-12">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo e(Session::get('message_sucesso')); ?>

                </div>
            <?php endif; ?>

            <?php if(Session::has('message_erro')): ?>
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Atenção!</h5>
                     <?php echo e(Session::get('message')); ?>

                </div>
            <?php endif; ?>


               <input type='hidden' id='tab'  <?php if(Session::has('tab')): ?> value="<?php echo e(Session::get('tab')); ?>" <?php else: ?> value='tab_processo' <?php endif; ?>>
                <div class="card card-primary card-outline card-outline-tabs">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-four-processo-tab" data-toggle="pill"
                                    href="#tab_processo" role="tab" aria-controls="custom-tabs-four-processo"
                                    aria-selected="true">Processo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-home-tab" data-toggle="pill"
                                    href="#tab_documento" role="tab" aria-controls="custom-tabs-four-home"
                                    aria-selected="true">Documentos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                    href="#tab_anexo" role="tab" aria-controls="custom-tabs-four-profile"
                                    aria-selected="false">Anexos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill"
                                    href="#tab_tramite" role="tab"
                                    aria-controls="custom-tabs-four-messages" aria-selected="false">Encaminhar Processo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-informacoes-tab" data-toggle="pill"
                                    href="#tab_informacoes" role="tab" aria-controls="custom-tabs-four-informacoes"
                                    aria-selected="false">Informações do Processo</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body " >
                        <input type='hidden' id='processo' name='processo' value='<?php echo e($processo->id); ?>' />
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <div class="tab-pane fade show active" id="tab_processo" role="tabpanel"
                                aria-labelledby="custom-tabs-four-processo-tab">
                                <?php echo $__env->make('processo.tab_processo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="tab-pane fade" id="tab_documento" role="tabpanel"
                                aria-labelledby="custom-tabs-four-home-tab">
                                <?php echo $__env->make('processo.tab_documento', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>

                            <div class="tab-pane fade" id="tab_anexo" role="tabpanel"
                                aria-labelledby="custom-tabs-four-profile-tab">
                                <?php echo $__env->make('processo.tab_anexo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="tab-pane fade" id="tab_tramite" role="tabpanel"
                                aria-labelledby="custom-tabs-four-messages-tab">
                                <?php echo $__env->make('processo.tab_tramitacao', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="tab-pane fade table-responsive p-0" id="tab_informacoes" role="tabpanel"
                                aria-labelledby="custom-tabs-four-informacoes-tab" style="height: 500px;">
                                <?php echo $__env->make('processo.tab_informacoes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.card -->
            </div>
        </div>
</div>
</section>
</div>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-adicionais'); ?>

<script src="<?php echo e(asset('plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/base.js')); ?>"></script>
<script src="<?php echo e(asset('js/processo.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/processus/resources/views/processo/edit.blade.php ENDPATH**/ ?>
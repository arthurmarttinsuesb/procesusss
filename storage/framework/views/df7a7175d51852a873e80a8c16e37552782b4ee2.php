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
                <div class="col-md-8">
                    <h1>Processo nº: <?php echo e($processo->numero); ?></h1><br>
                   
                   
                </div>
                <div class="col-md-4">
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
            <div class="col-md-8">
             <!-- DOCUMENTOS -->
             <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Informações do Processo</h2>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="height: 300px;">
                            <div class="col-md-12">
                                        <h5><b>Autor(a): </b> <?php echo e($processo->user->nome); ?></h5>
                                        <h5><b>Título: </b> <?php echo e($processo->titulo); ?></h5>
                                        <h5><b>Teor: </b> <?php echo e($processo->tipo); ?></h5>
                                        <h5><b>Descrição: </b><?php echo e($processo->descricao ?? "Não possui"); ?></h5> 
                                        <h5><b>Status do Processo: </b>  
                                            <?php if($processo->status=='Ativo'): ?> 
                                                 <span class="right badge badge-success">em andamento</span>
                                                <?php elseif($processo->status=='Encaminhado'): ?> 
                                                    <span class="right badge badge-success">em andamento</span>
                                                <?php elseif($processo->status=='Finalizado' || $processo->status=='Encerrado'): ?>   
                                                     <span class="right badge badge-danger">concluido</span>
                                            <?php endif; ?>   
                                        </h5>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
        <!-- /.row -->
            <!-- DOCUMENTOS -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Documentos</h2>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                            <thead>
                               <tr>
                                    <th>Título</th>
                                    <th>Conteúdo</th>
                                    <th>Status</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $processo_documento; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $documentos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($documentos->titulo); ?></td>
                                        <td><?php echo e($documentos->tipo); ?></td>
                                        <td>
                                        <?php $documento_tramite = app('App\DocumentoTramite'); ?>
                                        <?php if($documento_tramite->where('fk_processo_documento', $documentos->id)->where('status','!=','Inativo')->count()==0): ?>
                                            <span class="right badge badge-success">em andamento</span>
                                        <?php else: ?>
                                            <?php if($documento_tramite->where('fk_processo_documento', $documentos->id)->where('status','Pendente')->count()==0): ?>
                                                <span class="right badge badge-secondary">concluído</span>
                                            <?php else: ?>
                                                <span class="right badge badge-info">enviado</span>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($documentos->tipo=="Público"): ?>
                                                <a href="/pdf/documento/<?php echo e($documentos->id); ?>"
                                                    class="btn bg-teal color-palette btn-sm"
                                                    title="Visualizar" data-toggle="tooltip" target="_blank">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <?php elseif($documentos->tipo=="Privado"): ?>
                                                <span class="right badge badge-danger">Documento Privado</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                            </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
        <!-- /.row -->

            <!-- ANEXOS -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Anexos</h2>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Conteúdo</th>
                                    <th>Usuário</th>
                                    <th>Autenticado Por:</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $processo_anexo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anexos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($anexos->titulo); ?></td>
                                        <td><?php echo e($anexos->tipo); ?></td>
                                        <td><?php echo e($anexos->user->nome); ?></td>
                                        <td><?php echo e(isset($anexos->fk_user_atenticacao) ? $anexos->userAthenticated->nome : '(Sem autenticação)'); ?></td>
                                        <td>
                                            <?php if($anexos->tipo=="Público"): ?>
                                                <a href="/anexo/<?php echo e($anexos->arquivo); ?>"
                                                    class="btn bg-teal color-palette btn-sm"
                                                    title="Visualizar Anexo" data-toggle="tooltip" target="_blank">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            <?php elseif($anexos->tipo=="Privado"): ?>
                                                    <span class="right badge badge-danger">Anexo Privado</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                            </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
        <!-- /.row -->


           <!-- TRAMITAÇÃO -->
           <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Tramitação</h2>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>Encaminhamentos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $processo_tramitacao; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tramitacaos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><h5><?php echo e(isset($tramitacaos->fk_user) ? 'Enviado para: '.$tramitacaos->user->nome.' - '.date('d/m/Y H:s',strtotime($tramitacaos->created_at)) : 'Enviado para: '.$tramitacaos->setor->titulo.' - '.date('d/m/Y H:s',strtotime($tramitacaos->created_at))); ?></h5>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                            </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
        <!-- /.row -->



            </div>
            <div class="col-md-4" >
                <!-- TO DO List -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="ion ion-clipboard mr-1"></i>
                            Informações do Processo
                        </h3>
                        <div class="card-tools">
                            <ul class="pagination pagination-sm">
                               <?php echo e($log->links()); ?>

                            </ul>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <ul class="todo-list" data-widget="todo-list">
                            <li>
                                <?php $__currentLoopData = $log; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="handle">
                                        <i class="fas fa-arrow-right"></i>
                                    </span><?php echo $logs->status ?>
                                    <small class="badge badge-success"><i class="far fa-calendar-alt"></i> <?php echo e(date('d/m/Y - H:s', strtotime($logs->created_at))); ?></small><hr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/processus/resources/views/processo/show.blade.php ENDPATH**/ ?>
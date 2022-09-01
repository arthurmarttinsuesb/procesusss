 
 <?php $__env->startSection('htmlheader_title', 'Modelo de Documento'); ?>
 <?php $__env->startSection('contentheader_title', 'Modelo de Documento'); ?>
 
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
            <h1>Modelo de Documentos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Tela Inicial</a></li>
              <li class="breadcrumb-item active">Modelo Documento</li>
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
                    <a href="<?php echo e(URL::to('modelo-documento/create')); ?>" class="btn btn-block btn-outline-info"><i class="fa fa-plus"></i> Adicionar Modelo</a>
                </div>
            </div>
            <!-- /.card-header -->
            <?php if(Session::has('message')): ?>
                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                     <?php echo e(Session::get('message')); ?>

                </div>
            <?php endif; ?>
            <div class="card-body">
              <table id="table" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Tipo de Documento</th>
                    <th>Ação</th>
                  </tr>
                </thead>
                <tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
      <!-- /.row -->
    </section>
</div>
    <!-- /.content -->
 <!-- jQuery -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-adicionais'); ?>
   <script src="<?php echo e(asset('plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
   <script src="<?php echo e(asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
   <script src="<?php echo e(asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
   <script src="<?php echo e(asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
   <script src="<?php echo e(asset('js/base.js')); ?>"></script>
   <script src="<?php echo e(asset('js/listar_modelo_documento.js')); ?>"></script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/processus/resources/views/modeloDocumento/index.blade.php ENDPATH**/ ?>
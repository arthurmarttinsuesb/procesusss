<!-- Main Sidebar Container -->
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <?php $primeiro_nome = explode(' ', Auth::user()->nome); ?>
    <?php $permissao = Str::of(Auth::user()->getRoleNames())->replaceMatches('/[^A-Za-z0-9]++/', ''); ?>
    <!-- Brand Logo -->
    <a href="/home" class="brand-link elevation-4">
        <span class="logo-mini"><img src="<?php echo e(url('img/icone-processus.png')); ?>" alt="PROCESSUS-ÍCONE" style="width: 40px; height: 40px; padding: 4px;"></span>
        <span class="brand-text">Processus</span><br>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
            <?php $primeiroNome = explode(' ', Auth::user()->nome); ?>
            <a href="#" class="d-block"> Olá, <?php echo e($primeiro_nome[0]); ?></a>
            <span class="right badge badge-info"><?php echo e($permissao); ?></span>
          </div>
          <br>
      </div>
             
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">MENU</li>
            <?php if(auth()->user()->status == 'Ativo'): ?>
                <?php if(auth()->check() && auth()->user()->hasRole('administrador')): ?>
                  <?php echo $__env->make('layouts.partials.menu.administrador', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                <?php if(auth()->check() && auth()->user()->hasRole('cidadao')): ?>
                  <?php echo $__env->make('layouts.partials.menu.cidadao', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                <?php if(auth()->check() && auth()->user()->hasRole('colaborador-nivel-1')): ?>
                  <?php echo $__env->make('layouts.partials.menu.colaborador_nivel_1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                <?php if(auth()->check() && auth()->user()->hasRole('colaborador-nivel-2')): ?>
                  <?php echo $__env->make('layouts.partials.menu.colaborador_nivel_2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            <?php else: ?>
                <div class="alert alert-warning m-2">Aguardando Liberação.</div>
            <?php endif; ?>
          <li class="nav-item">
           <a href="<?php echo e(url('logout')); ?>"  class="nav-link" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <i class="nav-icon fa fa-power-off"></i>  
                    <p>
                        Sair da Conta
                    </p>
            </a>
            <form id="logout-form" action="<?php echo e(url('logout')); ?>" method="POST" style="display: none;">
                <?php echo e(csrf_field()); ?>

                <input type="submit" value="logout" style="display: none;">
            </form>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
<?php /**PATH /var/www/html/processus/resources/views/layouts/partials/menu_sidebar.blade.php ENDPATH**/ ?>
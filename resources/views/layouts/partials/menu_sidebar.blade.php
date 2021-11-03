<!-- Main Sidebar Container -->
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    @php $primeiro_nome = explode(' ', Auth::user()->nome); @endphp
    @php $permissao = Str::of(Auth::user()->getRoleNames())->replaceMatches('/[^A-Za-z0-9]++/', ''); @endphp
    <!-- Brand Logo -->
    <a href="/home" class="brand-link elevation-4">
        <span class="logo-mini"><img src="{{url('img/icone-processus.png')}}" alt="PROCESSUS-ÍCONE" style="width: 40px; height: 40px; padding: 4px;"></span>
        <span class="brand-text">Processus</span><br>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
            <?php $primeiroNome = explode(' ', Auth::user()->nome); ?>
            <a href="#" class="d-block"> Olá, {{$primeiro_nome[0]}}</a>
            <span class="right badge badge-info">{{$permissao}}</span>
          </div>
          <br>
      </div>
             
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">MENU</li>
            @if (auth()->user()->status == 'Ativo')
                @if($permissao=="administrador")
                    @include('layouts.partials.menu.administrador')
                        @elseif($permissao=="funcionario")
                            @include('layouts.partials.menu.funcionario')
                        @elseif($permissao=="cidadao")
                    @include('layouts.partials.menu.cidadao')
                @endif
            @else
                <div class="alert alert-warning m-2">Atenção, a sua conta estará passando por uma avaliação e em breve estará sendo liberada.</div>
            @endif
          <li class="nav-item">
           <a href="{{ url('logout') }}"  class="nav-link" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <i class="nav-icon fa fa-power-off"></i>  
                    <p>
                        Sair da Conta
                    </p>
            </a>
            <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
                <input type="submit" value="logout" style="display: none;">
            </form>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

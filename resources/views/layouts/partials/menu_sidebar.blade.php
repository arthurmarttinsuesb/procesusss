<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link elevation-4">
        <span class="logo-mini"><img src="{{url('img/icone-processus.png')}}" alt="PROCESSUS-ÍCONE"
                style="width: 40px; height: 40px; padding: 4px;"></span>
        <span class="brand-text">Processus</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-header">MENU</li>
                @if (auth()->user()->status == 'Ativo')
                <li class="nav-item">
                    <a href="/ativar-usuarios" class="nav-link">
                        <i class="nav-icon fa fa-user-plus"></i>
                        <p>Ativar Usuarios</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/modelo-documento" class="nav-link">
                        <i class="nav-icon fa fa-file"></i>
                        <p>Modelo Documento</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/secretaria" class="nav-link">
                        <i class="nav-icon fa fa-university"></i>
                        <p>Secretaria</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/processo" class="nav-link">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>Processo</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/setor" class="nav-link">
                        <i class="nav-icon 	fas fa-landmark"></i>
                        <p>Setor</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/usuario-setor" class="nav-link">
                        <i class="nav-icon fa fa-user"></i>
                        <p>Usuario Setor</p>
                    </a>
                </li>
                @else
                <div class="alert alert-warning m-2">Por favor, ative o usuario.</div>
                @endif
                <li class="nav-item">
                    <a href="{{ url('/logout') }}" class="nav-link" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        <i class="nav-icon fa fa-power-off"></i>
                        <p>
                            Sair da Conta
                        </p>
                    </a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
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
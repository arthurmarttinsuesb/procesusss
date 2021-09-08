<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link elevation-4">
        <span class="logo-mini"><img src="{{url('img/icone-processus.png')}}" alt="PROCESSUS-ÍCONE" style="width: 40px; height: 40px; padding: 4px;"></span>
        <span class="brand-text">Processus</span><br>

    </a>

    <!-- p style="color:white;font-family:verdana;text-align:center;"> Bem vindo, {{ Auth::user()->nome }}!</p> -->

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="image" style="color:white;font-family:verdana;">
                <p></p>
                <i class="nav-icon fa fa-user"></i>
            </div>

            <div class="info">
                <p class="d-block" style="color:white;font-family:verdana;text-transform: capitalize">{{ Auth::user()->nome }}
                    <br>
                    @foreach(Auth::user()->getRoleNames() as $nome)
                    @endforeach
                    <font face='arial' style="text-transform: cauppitalize"">{{ $nome }} </font>
                </p>
            </div>
        </div>
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image" style="color:white;font-family:verdana;">
                <i class="fas fa-user-shield"></i>
            </div>
            <div class="info">
                @foreach(Auth::user()->getRoleNames() as $nome)
                @endforeach
                <p class="d-block" style="color:white;font-family:verdana;"> Usuário: {{ $nome }}</p>
            </div>
        </div> -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-header">MENU</li>
                @if (auth()->user()->status == 'Ativo')
                @foreach(Auth::user()->getRoleNames() as $nome)
                @if($nome=="administrador")
                @include('layouts.partials.menu.administrador')
                @elseif($nome=="funcionario")
                @include('layouts.partials.menu.funcionario')
                @elseif($nome=="cidadao")
                @include('layouts.partials.menu.cidadao')
                @endif
                @endforeach
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
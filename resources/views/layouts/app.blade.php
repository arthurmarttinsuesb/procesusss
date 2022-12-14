<!doctype html>
<html class="no-js" lang="pt">
@section('htmlheader')
@include('layouts.partials.htmlheader')
@show

<body class="sidebar-mini layout-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
        @include('layouts.partials.menu_navbar')
        @include('layouts.partials.menu_sidebar')

        @yield('conteudo')

    </div>
    @include('layouts.partials.footer')
    @section('scripts')
    @include('layouts.partials.scripts')
    @yield('scripts-adicionais')
</body>

</html>

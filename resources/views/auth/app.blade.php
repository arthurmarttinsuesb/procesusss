<!DOCTYPE html>
<html>
@section('htmlheader')
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Processus - @yield('htmlheader_title', 'Your title here')</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css') }}">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
@show

<body class="hold-transition login-page" style="background-image: url('{{'img/background-processus.png'}}'); 
    background-repeat: no-repeat; background-size: cover; background-position:center center;">
    @yield('conteudo')
    @section('scripts')
        <!-- jQuery -->
        <script src="{{asset('plugins/jquery/jquery.min.js')}} "></script>
        <!-- Bootstrap 4 -->
        <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}} "></script>
        <!-- AdminLTE App -->
        <script src="{{asset('dist/js/adminlte.min.js')}} "></script>
    @show
    @yield('scripts-adicionais')
</body>
</html>

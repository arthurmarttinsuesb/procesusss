@extends('layouts.sobrel')

@section('htmlheader_title', 'Home')
@section('contentheader_title', 'Home')
@section('conteudo')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sobre</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/login">Home</a></li>
                        <li class="breadcrumb-item active">Sobre</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main content -->

        <div class="row">
            <div class="col-md-4">
                <div class="card card-widget widget-user-2 shadow-sm">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-info">
                        <div class="widget-user-image">
                            <img class="img-circle elevation-2"
                                src="http://www2.uesb.br/cpds/wp-content/uploads/2014/05/claudi3.png" alt="User Avatar">
                        </div>
                        <!-- /.widget-user-image -->
                        <h3 class="widget-user-username">Claudia Ribeiro Santos Lopes</h3>
                        <h5 class="widget-user-desc">Gerente de Projeto / Analista Sênior</h5>
                    </div>
                    <div class="card-footer p-0">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Doutora em Difusão do Conhecimento pela Universidade Federal da Bahia (FACED/UFBA)

                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Professora da Universidade Estadual do Sudoeste da Bahia – UESB
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Coordenadora do Centro de Pesquisa e Desenvolvimento de Softwares – CPDS
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Coordenadora do Curso de Sistemas de Informação da UESB
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-widget widget-user-2 shadow-sm">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-info">
                        <div class="widget-user-image">
                            <img class="img-circle elevation-2"
                                src="http://www2.uesb.br/cpds/wp-content/uploads/2017/11/foto-jessica.jpg"
                                alt="User Avatar">
                        </div>
                        <!-- /.widget-user-image -->
                        <h3 class="widget-user-username">JÉSSICA CERQUEIRA</h3>
                        <h5 class="widget-user-desc">Scrum Master da Fábrica de Software</h5>
                    </div>
                    <div class="card-footer p-0">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Analista de Sistemas
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Desenvolvedora Web
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-widget widget-user-2 shadow-sm">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-info">
                        <div class="widget-user-image">
                            <img class="img-circle elevation-2"
                                src="http://www2.uesb.br/cpds/wp-content/uploads/2018/07/tailane.jpg" alt="User Avatar">
                        </div>
                        <!-- /.widget-user-image -->
                        <h3 class="widget-user-username">TAILANE MAIA</h3>
                        <h5 class="widget-user-desc">Discente do Curso Sistemas de Informação (UESB)</h5>
                    </div>
                    <div class="card-footer p-0">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Bolsista, atua em projetos desenvolvidos na Fábrica de Software
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card card-widget widget-user-2 shadow-sm">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-success">
                        <div class="widget-user-image">
                            <img class="img-circle elevation-2" src="https://imageshack.com/i/poDE39P4p"
                                alt="User Avatar">
                        </div>
                        <!-- /.widget-user-image -->
                        <h3 class="widget-user-username">RONALD MATOS</h3>
                        <h5 class="widget-user-desc">Discente do Curso Sistemas de Informação (UESB)</h5>
                    </div>
                    <div class="card-footer p-0">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Bolsista, atua em projetos desenvolvidos na Fábrica de Software
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-widget widget-user-2 shadow-sm">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-success">
                        <div class="widget-user-image">
                            <img class="img-circle elevation-2" src="https://imageshack.com/i/pmaLLFhnp"
                                alt="User Avatar">
                        </div>
                        <!-- /.widget-user-image -->
                        <h3 class="widget-user-username">ANDERSON PEREIRA</h3>
                        <h5 class="widget-user-desc">Discente do Curso Sistemas de Informação (UESB)</h5>
                    </div>
                    <div class="card-footer p-0">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Bolsista, atua em projetos desenvolvidos na Fábrica de Software
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-widget widget-user-2 shadow-sm">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-success">
                        <div class="widget-user-image">
                            <img class="img-circle elevation-2" src="https://imageshack.com/i/podRNMmWp"
                                alt="User Avatar">
                        </div>
                        <!-- /.widget-user-image -->
                        <h3 class="widget-user-username">TÚLIO CALIL</h3>
                        <h5 class="widget-user-desc">Discente do Curso Sistemas de Informação (UESB)</h5>
                    </div>
                    <div class="card-footer p-0">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Bolsista, atua em projetos desenvolvidos na Fábrica de Software
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
<script src="{{asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/base.js') }}"></script>
<script src="{{ asset('js/home.js') }}"></script>
@endsection
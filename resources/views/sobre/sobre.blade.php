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
        <div class="container-fluid">
            <h4>Projeto</h4>
            <div class="row" style="background: #fff; border-top: 1px solid #dee2e6; border-bottom: 1px solid #dee2e6; color: black; margin-bottom: 150px">
                <div class="col-md-12" style="padding-bottom: 50px;">
                    <p>Sistema de gestão de controle e processus desenvolvido através do convenio Convênio 001/2019 PMJ/UESB uesb e prefeitura.</p>
                </div>
                <!-- /.col -->
            </div>

            <h4>Equipe</h4>
            <div class="row">
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-9">
                            <a href="#">Claudia Ribeiro Santos Lopes</a>
                            <p>Gerencia de Projeto / Analista Sênior</p>
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
                <!-- /.col -->

                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-9">
                            <a href="#">Jéssica Cerqueira</a>
                            <p>Scrum Master e Desenvolvedor</p>
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
                <!-- /.col -->

                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-9">
                            <a href="https://linktr.ee/AndersonP.Almeida" target="_blank">Anderson P.Almeida</a>
                            <p>Desenvolvedor</p>
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
                <!-- /.col -->

                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-9">
                            <a href="#">Tailane Maia</a>
                            <p>Desenvolvedora</p>
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
                <!-- /.col -->

                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-9">
                            <a href="#">Túlio Calil</a>
                            <p>Desenvolvedor</p>
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
                <!-- /.col -->

                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-9">
                            <a href="#">Ronald Matos</a>
                            <p>Desenvolvedor</p>
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
                <!-- /.col -->

                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-9">
                            <a href="#">Willer Almeida</a>
                            <p>Testes do Sistema e Documentação</p>
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
                <!-- /.col -->
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

@extends('layouts.app')

@section('htmlheader_title', 'Home')
@section('contentheader_title', 'Home')

@section('conteudo')
    <div class="wrapper">
        @include('manual.manual_sidebar')
    </div>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manual do cidadão</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/home">Tela Inicial</a></li>
                            <li class="breadcrumb-item active">Manual</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
                <!-- Main content -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                                <div class="alert alert-info alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-info"></i> Encaminhar Processo</h5>
                                </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <h5>Em “Informação do Processo” você poderá ter acesso às atualizações em seus processos, sendo possível verificar se já foram finalizados ou se estão sendo tramitados.</h5>
                    <br>
                    <div class="filtr-item col-sm-12" data-category="1" data-sort="white sample">
                        <div class="row mb-12">
                            <div class="col-sm-12">
                                <img class="img-fluid" src="{{asset('dist/img/status.png') }}" alt="Photo">
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                </div>
        </section>
    </div>

@endsection
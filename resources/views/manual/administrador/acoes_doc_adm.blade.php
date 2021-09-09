@extends('layouts.app')

@section('htmlheader_title', 'Home')
@section('contentheader_title', 'Home')

@section('conteudo')
    <div class="wrapper">
        @include('manual.administrador.administrador_sidebar')
    </div>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manual do Administrador</h1>
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
                                    <h5><i class="icon fas fa-info"></i> Ações no Documento</h5>
                                </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <h5>Na página de “Documentos” você terá acesso a algumas ações como:</h5>
                    <ul>
                        <li><i class="fa fa-eye"></i> Visualizar o documento</li>
                        <li><i class="fa fa-pencil-alt"></i> Fazer edição</li>
                        <li><i class="fa fa-paper-plane"></i> Encaminhar a algum setor</li>
                        <li><i class="fa fa-user-edit"></i> Fazer a assinatura virtual</li>
                        <li><i class="fa fa-trash"></i> Excluir o documento</li>
                    </ul>
                    <br>
                    <div class="filtr-item col-sm-12" data-category="1" data-sort="white sample">
                        <div class="row mb-12">
                            <div class="col-sm-12">
                                <img class="img-fluid" src="{{asset('dist/img/acoes.png') }}" alt="Photo">
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                    <br>
                    <h5>Clique no símbolo  <i class="fas fa-user-edit"></i>, para fazer a assinatura virtual e confirme a operação.</h5>
                </div>
        </section>
    </div>

@endsection
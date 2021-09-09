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
                                    <h5><i class="icon fas fa-info"></i> Setor</h5>
                                </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <h5>Ao clicar em Setor você poderá adicionar setores atuantes nas secretárias/unidades municipais clicando em <strong>“Adicionar Setor”</strong></h5>
                    <br>
                    <div class="filtr-item col-sm-12" data-category="1" data-sort="white sample">
                        <div class="row mb-12">
                            <div class="col-sm-12">
                                <img class="img-fluid" src="{{asset('dist/img/setores.png') }}" alt="Photo">
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                    <br>
                    <h5>Também é possível editar as informações de setores já criadas clicando em <i class="fa fa-pencil-alt"></i>, para isto, você será redirecionado(a) para a seguinte página.</h5>
                    <br>
                    <div class="filtr-item col-sm-12" data-category="1" data-sort="white sample">
                        <div class="row mb-12">
                            <div class="col-sm-12">
                                <img class="img-fluid" src="{{asset('dist/img/edit-setor.png') }}" alt="Photo">
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                    <br>
                    <h5>Informe o nome da Unidade em <strong>“Título”</strong>, sua sigla, a secretaria a qual este setor está ligado e seu email.</h5>
                    <h5>Se o setor já não é mais atuante, você pode removê-lo clicando em excluir e em seguida confirmando esta exclusão em <strong>“Sim, quer excluir!”</strong> que irá aparecer para você.</h5>
                    <br>
                    <div class="filtr-item col-sm-6" data-category="1" data-sort="white sample">
                        <div class="row mb-8">
                            <div class="col-sm-8">
                                <img class="img-fluid" src="{{asset('dist/img/excluir-setor.png') }}" alt="Photo">
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                    <br>
                </div>
        </section>
    </div>
@endsection
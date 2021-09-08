@extends('layouts.app')

@section('htmlheader_title', 'Home')
@section('contentheader_title', 'Home')

@section('conteudo')
    <div class="wrapper">
        @include('manual.colaborador.colaborador_sidebar')
    </div>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manual do Colaborador</h1>
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
                                    <h5><i class="icon fas fa-info"></i> Adicionar Documento</h5>
                                </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <h5>Clique em “Adicionar Documento” no canto superior direito você será direcionado à seguinte página.</h5>
                    <br>
                    <div class="filtr-item col-sm-12" data-category="1" data-sort="white sample">
                        <div class="row mb-12">
                            <div class="col-sm-12">
                                <img class="img-fluid" src="{{asset('dist/img/add-doc-colaborador.png') }}" alt="Photo">
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                    <br>
                    <h5>Aqui você deverá preencher os campos com o título do seu documento.</h5>
                    <h5>Depois escolher o modelo de documento (existem alguns <i>modelos já prontos</i> de documentos formais para fazer o preenchimento”, mas também é possível criar um novo modelo e este pode ficar salvo para um uso posterior).</h5>
                    <br>
                    <div class="filtr-item col-sm-12" data-category="1" data-sort="white sample">
                        <div class="row mb-12">
                            <div class="col-sm-12">
                                <img class="img-fluid" src="{{asset('dist/img/modelo-documento.png') }}" alt="Photo">
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                    <br>
                    <h5>É possível definir a privacidade do documento, podendo ser público ou privado.</h5>
                    <h5>Ao finalizar a criação do documento você será redirecionado à página onde é possível ver os seus documentos já criados.</h5>
                </div>
        </section>
    </div>

@endsection
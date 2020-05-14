@extends('layouts.app')

@section('htmlheader_title', 'Secretaria')
@section('contentheader_title', 'Secretaria')

@section('conteudo')
<link rel="stylesheet" href="{{ asset('plugins/summernote/summernote.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/iziToast/iziToast.min.css') }}">


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar Secretaria: {{ $secretaria->titulo }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('listar_modelo')}}">Home</a></li>
                        <li class="breadcrumb-item active">Secretaria</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <div class="col-2 float-right">
                            <a href="{{ URL::to('secretaria.index') }}" class="btn btn-block btn-outline-info "><i class="fa fa-list-alt"></i> Listar Secretarias</a>
                        </div>
                    </div>
                </div>
                <div class="alert alert-danger erros" style="display: none;">
                    <strong>Atenção!</strong> Houve algum problema com as suas informações.<br><br>
                    <ul></ul>
                </div>
                <form method="POST" action="/secretaria/{{$secretaria->id}}" id="form">
                    (<span style="color: red;">*</span>) Campos Obrigatórios
                    <br><br>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-6">
                                <strong>Titulo</strong>
                                <input value='{{$secretaria->titulo}}' type="text" autocomplete="off" id="titulo" name="titulo" class="form-control">
                            </div>
                            <div class="form-group col-6">
                                <strong>Sigla</strong>
                                <input value='{{$secretaria->sigla}}' type="text" autocomplete="off" id="sigla" name="sigla" class="form-control">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info float-right salvar" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>
                    &nbsp Aguarde...">Salvar</button>
                        </div>
                        <!-- /.card-footer -->
                </form>
            </div>
            <!-- /.card -->

        </div>
</div>
</section>
</div>
@endsection

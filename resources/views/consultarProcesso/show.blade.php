@extends('layouts.app')

@section('htmlheader_title', 'Setor')
@section('contentheader_title', 'Setor')

@section('conteudo')
<link rel="stylesheet" href="{{ asset('plugins/summernote/summernote.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/iziToast/iziToast.min.css') }}">


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Setor: {{ $setor->titulo }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Setor</li>
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
                            <a href="{{ route('setor.index') }}" class="btn btn-block btn-outline-info "><i class="fa fa-list-alt"></i> Listar Setor</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-danger erros" style="display: none;">
                            <strong>Atenção!</strong> Houve algum problema com as suas informações.<br><br>
                            <ul></ul>
                        </div>
                        (<span style="color: red;">*</span>) Campos Obrigatórios
                        <br><br>
                        <form method="POST" id="form">
                            <div class="box-body">
                                <div class="form-group">
                                    <strong>Titulo</strong>
                                    <input readonly type="text" autocomplete="off" id="titulo" name="titulo" class="form-control" value="{{ $setor->titulo }}">
                                </div>
                                <div class="form-group">
                                    <strong>Sigla</strong>
                                    <input readonly type="text" autocomplete="off" id="sigla" name="sigla" class="form-control" value="{{ $setor->sigla }}">
                                </div>
                                <div class="form-group">
                                    <strong>Status</strong>
                                    <input readonly type="text" autocomplete="off" id="status" name="status" class="form-control" value="{{ $setor->status }}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button disabled type="button" class="btn btn-action btn-success btnNovo" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>
                                    &nbsp Aguarde...">
                                    <span class="fa fa-save disabled"></span> Atualizar
                                </button>
                            </div> <!-- Fim de ModaL Footer-->
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content -->
<script src="{{asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/plugins/summernote/summernote.min.js') }}"></script>
<script src="{{ asset('/plugins/iziToast/iziToast.min.js') }}"></script>
<script src="{{ asset('js/base.js') }}"></script>
<script src="{{ asset('js/modelo_documento.js') }}"></script>
@endsection
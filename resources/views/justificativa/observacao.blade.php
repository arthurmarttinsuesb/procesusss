@extends('layouts.app')

@section('htmlheader_title', 'Observação para Devolução')
@section('contentheader_title', 'Observação para Devolução')

@section('conteudo')
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{asset('plugins/jquery-ui/jquery-ui.min.css') }}">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Observação para Devolução</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Tela Inicial</a></li>
                        <li class="breadcrumb-item active">Observação para Devolução</li>
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
                        <div class=" float-right">
                            <a href="/processo/{{$processo_busca->numero}}/edit" class="btn btn-block btn-outline-info "><i class="fa fa-undo-alt"></i> Retornar ao Processo</a>
                        </div>
                    </div>

                    @if (Session::has('message_erro'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-ban"></i> Atenção!</h5>
                        {{ Session::get('message') }}
                    </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="/processo/{{$processo_busca->id}}/devolverObservacao/{{$tramite_busca->id}}" id="observacao_form">
                            @csrf
                            (<span style="color: red;">*</span>) Campos Obrigatórios
                            <br><br>

                            <div class="row">
                                <div class="form-group col-6">
                                    <strong>Observação <span style="color: red;">*</span></strong>
                                    <input type="text" autocomplete="off" name="justificativa" id="justificativa" class="form-control @error('justificativa') is-invalid @enderror"
                                    value="{{ old('justificativa')}} ">
                                    @error('justificativa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </form>
                    </div>
                    <div class="card-footer">
                        <button type="submit" form="observacao_form" class="btn btn-info float-right" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>
                    &nbsp Aguarde...">Salvar</button>
                    </div>
                    <!-- /.card-footer -->

                    <!-- /.card -->

                </div>
            </div>
    </section>
</div>


@include('sweetalert::alert')
@endsection
@section('scripts-adicionais')

<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/base.js') }}"></script>
<script src="{{ asset('js/processo.js') }}"></script>
@endsection

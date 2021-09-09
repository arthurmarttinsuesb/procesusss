@extends('layouts.app')

@section('htmlheader_title', 'Replicar Processo')
@section('contentheader_title', 'Replicar Processo')

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
                    <h1>Replica do Processo nº: {{$processo->numero}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Tela Inicial</a></li>
                        <li class="breadcrumb-item active">Processos</li>
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
                        <div class="row">
                            <div class="col-xl-10 col-sm-9">
                            </div>
                            <div class="col-xl-2 col-sm-3">
                                <a href="{{ URL::to('processo') }}" class="btn btn-block btn-outline-info "><i
                                    class="fa fa-list-alt"></i> Processos</a>
                            </div>
                        </div>
                    </div>

                    @if (Session::has('message'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-ban"></i> Atenção!</h5>
                        {{ Session::get('message') }}
                    </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="/processo/{{$processo->id}}/salvarReplicar" id="processo">
                            @csrf
                            (<span style="color: red;">*</span>) Campos Obrigatórios
                            <br><br>
                            <input type="text" autocomplete="off" name="id_processo_antigo" id="id_processo_antigo" value="{{$processo->id}}" hidden>
                            <input type="text" autocomplete="off" name="n_processo_antigo" id="n_processo_antigo" value="{{$processo->numero}}" hidden>
                            <div class="row">
                                <div class="form-group col-6">
                                    <strong>Processo <span style="color: red;">*</span></strong>
                                    <select type="text" name="tipo" class="form-control @error('tipo') is-invalid @enderror">
                                        @foreach(Auth::user()->getRoleNames() as $nome)
                                            @if($nome=="cidadao")
                                                <option>Público</option>
                                                @else
                                                <option>Público</option>
                                                <option>Privado</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('tipo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-6">
                                    <strong>Título <span style="color: red;">*</span></strong>
                                    <input type="text" autocomplete="off" name="titulo" id="titulo" class="form-control @error('titulo') is-invalid @enderror"
                                    value="{{ old('titulo')}} ">
                                    @error('titulo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <strong>Descrição</strong>
                                    <textarea class="textarea form-control @error('descricao') is-invalid @enderror" name='descricao' id='descricao'
                                    value="{{ old('descricao')}}"></textarea>
                                    @error('descricao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-12" style="height: 500px;">
                                    <h3><strong>Selecionar os Documentos</strong></h3>
                                         @foreach($processo_documento as $doc)
                                            <div class="form-group @error('doc') is-invalid @enderror col-3">
                                                <input type="checkbox" id="{{$doc->id}}" name="doc[]" value="{{$doc->id}}">
                                                <label for="nenhuma">{{$doc->titulo}}</label>
                                            </div>
                                        @endforeach
                                        @error('doc')
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
                        <button type="submit" form="processo" class="btn btn-info float-right" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>
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

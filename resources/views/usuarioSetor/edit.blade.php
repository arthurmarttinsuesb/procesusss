@extends('layouts.app')

@section('htmlheader_title', 'Usuarios e Setores')
@section('contentheader_title', 'Usuarios e Setores')

<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

@section('conteudo')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Usuarios e Setores</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('listar_modelo')}}">Home</a></li>
                        <li class="breadcrumb-item active">Usuarios e Setores</li>
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
                            <a href="{{ URL::to('usuario-setor') }}" class="btn btn-block btn-outline-info "><i class="fa fa-list-alt"></i> Listar Usuarios e Setores</a>
                        </div>
                    </div>

                    @if (Session::has('message'))
                    <div class="alert alert-danger alert-dismissible m-2">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-ban"></i> Atenção!</h5>
                        {{ Session::get('message') }}
                    </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="/usuario-setor/{{$usuarioSetor->id}}" id="usuario-setor">
                            @csrf
                            @method('PUT')
                            (<span style="color: red;">*</span>) Campos Obrigatórios
                            <br><br>

                            <div class="row">
                                <div class="form-group col-6">
                                    <strong>Usuario <span style="color: red;">*</span></strong>
                                    <select class="form-control select2 form-control @error('fk_user', 'usuario-setor') is-invalid @enderror" name="fk_user">
                                        @foreach ($users as $user)
                                        @if (old('fk_user') == $user->id)
                                        <option value="{{$user->id}}" selected>{{$user->nome}}</option>
                                        @else
                                        <option value="{{$user->id}}">{{$user->nome}}</option>
                                        @endif

                                        @endforeach
                                    </select>
                                    @error('fk_user','usuario-setor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <strong>Setor <span style="color: red;">*</span></strong>
                                    <select class="form-control select2 form-control @error('fk_setor', 'usuario-setor') is-invalid @enderror" name="fk_setor">
                                        @foreach ($setores as $setor)
                                        @if (old('fk_setor') == $setor->id)
                                        <option value="{{$setor->id}}" selected>{{$setor->titulo}}</option>
                                        @else
                                        <option value="{{$setor->id}}">{{$setor->titulo}}</option>
                                        @endif

                                        @endforeach
                                    </select>
                                    @error('fk_setor','usuario-setor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <strong>Data Entrada <span style="color: red;">*</span></strong>
                                    <input type="text" value="{{ old('data_entrada', date('d-m-Y', strtotime($usuarioSetor->data_entrada))) }}" autocomplete="off" id="data_entrada" name="data_entrada" class="form-control @error('data_entrada', 'usuario-setor') is-invalid @enderror" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false">
                                    @error('data_entrada','usuario-setor')
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
                        <button type="submit" form="usuario-setor" class="btn btn-info float-right" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>
                    &nbsp Aguarde...">Salvar</button>
                    </div>
                    <!-- /.card-footer -->

                    <!-- /.card -->

                </div>
            </div>
    </section>
</div>

@endsection
@section('scripts-adicionais')
<script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
<script src="{{ asset('js/usuario-setor.js') }}"></script>
@endsection

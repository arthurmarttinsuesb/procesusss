@extends('layouts.app')

@section('htmlheader_title', 'Colaboradores')
@section('contentheader_title', 'Colaboradores')

<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

@section('conteudo')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Alterar Colaborador</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Tela Inicial</a></li>
                        <li class="breadcrumb-item active">Colaboradores</li>
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
                        <div class="float-right">
                            <a href="{{ URL::to('usuario-setor') }}" class="btn btn-block btn-outline-info "><i class="fa fa-list-alt"></i> Listar Colaboradores</a>
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
                                <div class="form-group col-xl-4 col-sm-4">
                                    <strong>Nome do Usuário</strong>
                                    <input type="text" value="{{ $usuarioSetor->user->nome }}" id="fk_user" name="fk_user" class="form-control @error('fk_user', 'usuario-setor') is-invalid @enderror" disabled>
                                    @error('fk_user','usuario-setor')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-xl-4 col-sm-4">
                                    <strong>Permissão <span style="color: red;">*</span></strong>
                                    <select class="form-control select2 form-control @error('tipo') is-invalid @enderror" name="tipo">
                                        <option value="">Selecione</option>
                                        <option value="administrador" @if("administrador"==$usuarioSetor->user->getRoleNames()->implode(', ') ) Selected @endif>Administrador</option>
                                        <option value="colaborador-nivel-2" @if("colaborador-nivel-2"==$usuarioSetor->user->getRoleNames()->implode(', ') ) Selected @endif>Colaborador Nível 2</option>
                                        <option value="colaborador-nivel-1" @if("colaborador-nivel-1"==$usuarioSetor->user->getRoleNames()->implode(', ') ) Selected @endif>Colaborador Nível 1</option>
                                    </select>
                                    @error('tipo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-xl-2 col-sm-2">
                                    <strong>Data Entrada <span style="color: red;">*</span></strong>
                                    <input type="date" value="{{ $usuarioSetor->data_entrada }}" autocomplete="off" id="data_entrada" name="data_entrada" class="form-control @error('data_entrada', 'usuario-setor') is-invalid @enderror">
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
<script src="{{ asset('js/usuarioSetor.js') }}"></script>
@endsection
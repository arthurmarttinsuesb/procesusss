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
                    <h1>Adicionar Colaborador</h1>
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
                        <div class=" float-right">
                            <a href="{{ URL::to('usuario-setor') }}" class="btn btn-block btn-outline-info ">
                                <i class="fa fa-list-alt"></i> Listar Colaboradores
                            </a>
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
                        (<span style="color: red;">*</span>) Campos Obrigatórios
                        <div class="form-group row">
                                <div class="col-sm-6">
                                    <input  data-toggle="tooltip" data-placement="top" placeholder="Digite o e-mail do usuário para realizar a busca" type="text" autocomplete="off" class="form-control" id='campo_busca' />
                                </div>
                                <div class="col-sm-6">
                                    <button type="button" class="btn btn-info float-left buscar_user" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>&nbsp Aguarde..."> <i class='fa fa-search'></i> Buscar Usuário</button>
                                </div>
                            </div>
                        <form method="POST" action="/usuario-setor" id="usuario-setor">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <strong>Usuário <span style="color: red;">*</span></strong>
                                    <select class="form-control select2 form-control @error('fk_user', 'usuario-setor') is-invalid @enderror" name="fk_user">
                                       
                                    </select>
                                    @error('fk_user','usuario-setor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <strong> Secretaria <span style="color: red;">*</span></strong>
                                    <select class="form-control select2 form-control @error('fk_sect', 'usuario-setor') is-invalid @enderror" name="fk_sect" id="fk_sect">
                                        <option value="">Selecione</option>
                                        @foreach ($secretarias as $secretaria)
                                        <option value="{{$secretaria->id}}">{{$secretaria->sigla}}</option>
                                        @endforeach
                                        
                                    </select>
                                    @error('fk_setor','usuario-setor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <strong>Setor <span style="color: red;">*</span></strong>
                                    <select class="form-control select2 form-control @error('fk_setor', 'usuario-setor') is-invalid @enderror" name="fk_setor" id = "fk_setor">

                                    </select>
                                    @error('fk_setor','usuario-setor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <strong>Tipo de Usuário <span style="color: red;">*</span></strong>
                                    <select name="tipo" class="form-control select2 form-control @error('tipo') is-invalid @enderror">
                                        <option value="">Selecione</option>
                                        <option value="administrador">Administrador</option>
                                        <option value="colaborador-nivel-1">Colaborador Nível 1</option>
                                        <option value="colaborador-nivel-2">Colaborador Nível 2</option>
                                    </select>
                                    @error('tipo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <strong>Data Entrada <span style="color: red;">*</span></strong>
                                    <input type="text" autocomplete="off" id="data_entrada" name="data_entrada" class="form-control @error('data_entrada', 'usuario-setor') is-invalid @enderror" value="{{ old('data_entrada', date('d/m/Y')) }}" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false">
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
<script src="{{ asset('js/base.js') }}"></script>
<script src="{{ asset('js/usuarioSetor.js') }}"></script>
@endsection
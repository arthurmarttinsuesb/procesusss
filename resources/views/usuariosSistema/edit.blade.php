@extends('layouts.app')

@section('htmlheader_title', 'Usuários do Sistema')
@section('contentheader_title', 'Usuários do Sistema')

<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

@section('conteudo')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Alterar Usuário</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Tela Inicial</a></li>
                        <li class="breadcrumb-item active">Usuarios do Sistema</li>
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
                                <a href="{{ URL::to('usuarios') }}" class="btn btn-block btn-outline-info "><i
                                    class="fa fa-list-alt"></i>Listar Usuarios</a>
                            
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
                        <form method="POST" action="/usuarios/{{$usuarios->id}}" id="usuarios">
                            @csrf
                            @method('PUT')
                            (<span style="color: red;">*</span>) Campos Obrigatórios
                            <br><br>

                            <div class="row">
                                <div class="form-group col-12">
                                    <strong>Usuário<span style="color: red;">*</span></strong>
                                    <input type="text" autocomplete="off" id="nome" name="nome" class="form-control @error('nome') is-invalid @enderror" value="{{$usuarios->nome}}">
                                    @error('nome')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                               
                            </div>
                            
                                
                                <div class="form-group col-xl-4 col-sm-4">
                                    <strong>Tipo de Usuário <span style="color: red;">*</span></strong>
                                    <select
                                        class="form-control select2 form-control @error('tipo') is-invalid @enderror"
                                        name="tipo">
                                        <option value="">Selecione</option>
                                        <option value="administrador" @if("administrador"==$usuarios->getRoleNames()->implode(', ') ) Selected @endif>Administrador</option>
                                        <option value="colaborador-nivel-2" @if("colaborador-nivel-2"==$usuarios->getRoleNames()->implode(', ') ) Selected @endif>Colaborador Nível 2</option>
                                        <option value="colaborador-nivel-1" @if("colaborador-nivel-1"==$usuarios->getRoleNames()->implode(', ') ) Selected @endif>Colaborador Nível 1</option>
                                        <option value="cidadao" @if("cidadao"==$usuarios->getRoleNames()->implode(', ') ) Selected @endif>Cidadão</option>
    
                                    </select>
                                    @error('tipo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <strong>Email<span style="color: red;">*</span></strong>
                                        <input type="text" autocomplete="off" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$usuarios->email}}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <strong>Telefone<span style="color: red;">*</span></strong>
                                        <input type="text" autocomplete="off" id="telefone" name="telefone" class="form-control @error('telefone') is-invalid @enderror" value="{{$usuarios->telefone}}">
                                        @error('telefone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </form>
                    </div>
                    <div class="card-footer">
                        <button type="submit" form="usuarios" class="btn btn-info float-right" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>
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
<script src="{{ asset('js/usuarios.js') }}"></script>
@endsection
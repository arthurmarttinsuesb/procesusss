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
                        <form method="POST" action="/usuarios/{{$usuarios->id}}" id="usuarios" >
                            @csrf
                            @method('PUT')
                            (<span style="color: red;">*</span>) Campos Obrigatórios
                            <br><br>

                            <div class="row">
                                <div class="form-group col-8">
                                    <strong>Usuário<span style="color: red;">*</span></strong>
                                    <input type="text" autocomplete="off" id="nome" name="nome" class="form-control @error('nome') is-invalid @enderror" value="{{$usuarios->nome}}">
                                    @error('nome')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-xl-4 col-sm-4">
                                    <strong>Sexo <span style="color: red;">*</span></strong>
                                    <select
                                        class="form-control select2 form-control @error('sexo') is-invalid @enderror"
                                        name="sexo">
                                        <option value="">Selecione</option>
                                        <option value="Masculino" @if("Masculino"==$usuarios->sexo ) Selected @endif>Masculino</option>
                                        <option value="Feminino" @if("Feminino"==$usuarios->sexo ) Selected @endif>Feminino</option>

                                    </select>
                                    @error('sexo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                             <div class="row">   
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
                                <div class="form-group col-8">
                                        <strong>Cpf/Cnpj<span style="color: red;">*</span></strong>
                                        <input type="text" autocomplete="off" id="cpf_cnpj" name="cpf_cnpj" class="form-control @error('cpf') is-invalid @enderror" value="{{$usuarios->cpf_cnpj}}">
                                        @error('cpf_cnpj')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-4">
                                        <strong>Email<span style="color: red;">*</span></strong>
                                        <input type="text" autocomplete="off" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$usuarios->email}}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-4">
                                        <strong>Data de nascimento<span style="color: red;">*</span></strong>
                                        <input type="date" autocomplete="off" id="nascimento" name="nascimento" class="form-control @error('nacimento') is-invalid @enderror" value="{{$usuarios->nascimento}}">
                                        @error('nascimento')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                   
                                    <div class="form-group col-md-4">
                                        <strong>Telefone<span style="color: red;">*</span></strong>
                                        <input type="text" autocomplete="off" id="telefone" name="telefone" class="form-control @error('telefone') is-invalid @enderror" value="{{$usuarios->telefone}}">
                                        @error('telefone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-4">
                                        <label>Estado <span style="color: red;">*</span></label>
                    
                                        <select id="estado" name='estado' class="form-control select2 @error('estado') is-invalid @enderror">
                                            <option value="">Selecione</option>
                                            @foreach($estados as $estado)
                                            <option value='{{$estado->id}}'@if($estado->id==$usuarios->fk_estado) Selected @endif>{{$estado->nome}}</option>
                                            @endforeach
                                        </select>
                                        @error('estado')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <label>Cidade <span style="color: red;">*</span></label>
                            
                                        <select id="cidade" name='cidade' class="form-control select2 @error('cidade') is-invalid @enderror">
                                            <option value="">Selecione</option>
                                            @foreach($cidades as $cidade)
                                            <option value='{{$cidade->id}}' @if($cidade->id==$usuarios->fk_cidade) Selected @endif>{{$cidade->nome}}</option>
                                            @endforeach
                                        </select>
                                        @error('cidade')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    
                                    

                                    <div class="form-group col-md-4">
                                        <strong>Rua/Avenida<span style="color: red;">*</span></strong>
                                        <input type="text" autocomplete="off" id="logradouro" name="logradouro" class="form-control @error('logradouro') is-invalid @enderror" value="{{$usuarios->logradouro}}">
                                        @error('logradouro')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <strong>Bairro<span style="color: red;">*</span></strong>
                                        <input type="text" autocomplete="off" id="bairro" name="bairro" class="form-control @error('bairro') is-invalid @enderror" value="{{$usuarios->bairro}}">
                                        @error('bairro')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <strong>CEP<span style="color: red;">*</span></strong>
                                        <input type="text" autocomplete="off" id="cep" name="cep" class="form-control @error('cep') is-invalid @enderror" value="{{$usuarios->cep}}">
                                        @error('cep')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <strong>Numero<span style="color: red;">*</span></strong>
                                        <input type="text" autocomplete="off" id="numero" name="numero" class="form-control @error('numero') is-invalid @enderror" value="{{$usuarios->numero}}">
                                        @error('numero')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <strong>Complemento<span style="color: red;">*</span></strong>
                                        <input type="text" autocomplete="off" id="complemento" name="complemento" class="form-control @error('complemento') is-invalid @enderror" value="{{$usuarios->complemento}}">
                                        @error('complemento')
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
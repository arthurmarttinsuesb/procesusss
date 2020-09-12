@extends('layouts.app')

@section('htmlheader_title', 'Alterar Dados do Usuário')
@section('contentheader_title', 'Alterar Dados do Usuário')

@section('conteudo')
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Alterar Dados do Usuário</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Alterar Dados do Usuário</li>
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
                        <div class="col-3 float-right">
                            <a href="{{ URL::to('/ativar-usuarios') }}" class="btn btn-block btn-outline-info "><i class="fa fa-list-alt"></i> Listar Usuários Inativos</a>
                        </div>
                    </div>

                    @if (Session::has('message'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-ban"></i> Atenção!</h5>
                        {{ Session::get('message') }}
                    </div>
                    @endif
                    <form action="/ativar-usuarios/{{$modelo->id}}" method="post" id="form">
                        @csrf
                        <div class="card-body">
                          (<span style="color: red;">*</span>) Campos Obrigatórios
                           <br><br>
                        <div class="row">
                            <div class="form-group col-8">
                                <label>Nome <span style="color: red;">*</span></label>
                                <input type="text" class="form-control @error('nome') is-invalid @enderror" placeholder="Nome Completo" name="nome" value="{{ $modelo->nome }}" />
                            </div>
                            <div class="form-group col-4">
                                <label>Data de Nascimento <span style="color: red;">*</span></label>
                                <input type="date" class="form-control @error('nascimento') is-invalid @enderror" name="nascimento" id="nascimento" maxlength="10" value="{{ $modelo->nascimento }}" placeholder="Data de Nascimento" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-3 sexo hidden">
                                <label>Gênero <span style="color: red;">*</span></label>
                                <select id="sexo" name="sexo" class="form-control select2 @error('sexo') is-invalid @enderror">
                                    <option value='' selected>Selecione ...</option>
                                    @if ($modelo->sexo == "Masculino")
                                    <option value="Masculino" selected>Masculino</option>
                                    @else
                                    <option value="Masculino">Masculino</option>
                                    @endif
                                    @if ($modelo->sexo == "Feminino")
                                    <option value="Feminino" selected>Feminino</option>
                                    @else
                                    <option value="Feminino">Feminino</option>
                                    @endif
                                </select>
                            </div>
                            <div class=" form-group col-3">
                                <label>Tipo <span style="color: red;">*</span></label>
                                <select id="tipo" name="tipo" class="form-control select2 @error('tipo') is-invalid @enderror">
                                    @if ($modelo->tipo == "PF")
                                    <option value="PF" selected>Pessoa Física</option>
                                    @else
                                    <option value="PF">Pessoa Física</option>
                                    @endif
                                    @if ($modelo->tipo == "PJ")
                                    <option value="PJ" selected>Pessoa Jurídica</option>
                                    @else
                                    <option value="PJ">Pessoa Jurídica</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group col-3">
                                <div class="form-group cpf">
                                    <label>CPF/CNPJ <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control @error('cpf_cnpj') is-invalid @enderror" name="cpf_cnpj" id="cpf_cnpj" placeholder="Identificação" value="{{ $modelo->cpf_cnpj }}" />
                                </div>
                            </div>
                            <div class="form-group col-3">
                                <div class="form-group cpf">
                                    <label>Telefone <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control @error('telefone') is-invalid @enderror" name="telefone" id="telefone" placeholder="(dd) 00000-000" data-inputmask='"mask":"(99)99999-9999"' value="{{ $modelo->telefone }}" data-mask />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-3">
                                <label>Estado <span style="color: red;">*</span></label>
                                @inject('estados', 'App\Estado')
                                <select id="estado" name='estado' class="form-control select2 @error('estado') is-invalid @enderror">
                                    <option value="">Selecione</option>
                                    @foreach($estados->get() as $estado)
                                        @if ($modelo->fk_estado == $estado->id)
                                        <option value="{{$estado->id}}" selected>{{$estado->nome}}</option>
                                        @else
                                        <option value='{{$estado->id}}'>{{$estado->nome}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-3">
                                <label>Cidade <span style="color: red;">*</span></label>
                                @inject('cidades', 'App\Cidade')
                                <select id="cidade" name='cidade' class="form-control select2 @error('cidade') is-invalid @enderror">
                                    <option value="">Selecione</option>
                                    @foreach($cidades->where('fk_estado',$modelo->fk_estado)->get() as $cidade)
                                        <option value="{{$cidade->id}}" @if ($modelo->fk_cidade == $cidade->id) selected @endif >
                                            {{$cidade->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label>Rua/Avenida <span style="color: red;">*</span></label>
                                <div class="form-group">
                                    <input type="text" class="form-control @error('logradouro') is-invalid @enderror" name="logradouro" id="logradouro" placeholder="Rua/Avenida" value="{{$modelo->logradouro}}" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-2">
                                <label>Número <span style="color: red;">*</span></label>
                                <input type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" id="numero" placeholder="Número" value="{{$modelo->numero}}" />
                            </div>
                            <div class="form-group col-4">
                                <label>Bairro <span style="color: red;">*</span></label>
                                <input type="text" class="form-control @error('bairro') is-invalid @enderror" name="bairro" id="bairro" placeholder="Bairro" value="{{$modelo->bairro}}" />
                            </div>
                            <div class="form-group col-2">
                                <label>CEP <span style="color: red;">*</span></label>
                                <input type="text" class="form-control @error('cep') is-invalid @enderror" name="cep" id="cep" placeholder="CEP" value="{{$modelo->cep}}" data-inputmask='"mask": "99999-999"' data-mask />
                            </div>
                            <div class="form-group col-4">
                                <label>Complemento <span style="color: red;">*</span></label>
                                <input type="text" class="form-control @error('complemento') is-invalid @enderror" name="complemento" id="complemento" placeholder="Complemento" value="{{$modelo->complemento}}" />
                            </div>
                        </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" form="setor" class="btn btn-info float-right salvar" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>
                            &nbsp Aguarde...">Salvar</button>
                            <!-- /.card-footer -->
                        </div>
                    </form>

                    <!-- /.card-body -->
                </div>
               

                <!-- /.card -->
            </div>
        </div>
    </section>
</div>
@endsection
@section('scripts-adicionais')
<script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
<script src="{{asset('plugins/inputmask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('js/base.js') }}"></script>
<script src="{{ asset('js/register.js') }}"></script>
@endsection

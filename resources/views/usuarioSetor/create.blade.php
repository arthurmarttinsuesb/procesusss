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
                        <form method="POST" action="/usuario-setor" id="usuario-setor">
                            @csrf
                            (<span style="color: red;">*</span>) Campos Obrigatórios
                            <br><br>

                            <div class="row">
                                <div class="form-group col-xl-4 col-sm-4">
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
                                <div class="form-group col-xl-4 col-sm-4">
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
                                <div class="form-group col-xl-4 col-sm-4">
                                    <strong>Setor <span style="color: red;">*</span></strong>
                                    <select class="form-control select2 form-control @error('fk_setor', 'usuario-setor') is-invalid @enderror" name="fk_setor" id = "fk_setor">

                                    </select>
                                    @error('fk_setor','usuario-setor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-xl-2 col-sm-2">
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
                                <div class="form-group col-xl-2 col-sm-2">
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
<script type="text/javascript">
    $(document).on('change', '#fk_sect', function() {
        var secretaria = $("#fk_sect option:selected").val();
        // console.log(secretaria);
        var option = "";
        $.getJSON("/selecionar-setor/" + secretaria, function(dados) {
            //Atibuindo valores à variavel com os dados da consulta
            option += '<option value="">Selecione</option>';
            $.each(dados.setores, function(i, setor) {
                option +=
                    '<option value="' +
                    setor.id +
                    '" >' +
                    setor.titulo +
                    "</option>";
            });
            //passando para o select de cidades
            console.log(option);
            $("#fk_setor").html(option).show();

        });
    });
</script>
<script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
<script src="{{ asset('js/usuario-setor.js') }}"></script>
@endsection
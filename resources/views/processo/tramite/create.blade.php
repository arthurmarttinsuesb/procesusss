@extends('layouts.app')

@section('htmlheader_title', 'Encaminhamento')
@section('contentheader_title', 'Encaminhamento')
@section('conteudo')
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-8">
          <h1>Encaminhar Processo nº {{$processo->numero}} </h1>
        </div>
        <div class="col-sm-4">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active">Encaminhamento</li>
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
              <a href="/processo/{{$processo->numero}}/edit" class="btn btn-block btn-outline-info "><i class="fa fa-undo-alt"></i> Retornar ao Processo</a>
            </div>
          </div>
          @if (Session::has('message'))
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Atenção!</h5>
            {{ Session::get('message') }}
          </div>
          @endif

          <form method="POST" id="tramite">
            @csrf
            <div class="card-body">
              (<span style="color: red;">*</span>) Campos Obrigatórios
              <br><br>
              <div class="row">
                <div class="form-group col-md-4">

                  <input type="hidden" name="processo" id="processo" value='{{$processo->numero}}'>
                  <input type="hidden" name="tramitacao" value="{{ $tramite->id ?? '' }}">


                  <!-- select_secretaria -->
                  <strong> Secretaria <span style="color: red;">*</span></strong>
                  <select class="form-control select2 form-control @error('fk_sect', 'usuario-setor') is-invalid @enderror" name="fk_sect" id="fk_sect">

                    @foreach ($secretarias as $secretaria)

                    <option value="{{$secretaria->id}}" selected>{{$secretaria->sigla}}</option>

                    @endforeach
                  </select>
                  @error('fk_setor','usuario-setor')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                  <strong>Setor <span style="color: red;">*</span></strong>
                  <select class="form-control select2 form-control @error('fk_setor', 'setor') is-invalid @enderror" name="fk_setor" id="select_secretaria">

                  </select>
                  @error('fk_setor','setor')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                  <!-- <select id="select_secretaria" class="form-control select2 @error('fk_setor', 'setor') is-invalid @enderror" name="fk_setor">
                    <option value="selecione" selected>Selecione</option>
                    @foreach ($secretarias as $secretaria)
                    @foreach ($setores as $setor)
                    @if($secretaria->id == $setor->fk_secretaria)
                    @if (old('fk_setor') == $setor->id)

                    <option value="{{$setor->id}}" selected>{{$secretaria->sigla}} - {{$setor->titulo}}</option>

                    @else
                    <option value="{{$setor->id}}">{{$secretaria->sigla}} - {{$setor->titulo}}</option>
                    @endif
                    @endif
                    @endforeach
                    @endforeach
                  </select>
                  @error('fk_setor','setor')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror -->
                </div>

                <!-- verifico se o tipo de usuário é cidadão, se for o campo do tipo usuário não vai ser mostrado-->
                <div class="form-group col-md-4" @foreach(Auth::user()->getRoleNames() as $nome) @if($nome=="cidadao") hidden @endif @endforeach>
                  <strong>Usuario <span style="color: red;">*</span></strong>
                  <select id="select_user" class="form-control select2 @error('fk_user', 'setor') is-invalid @enderror" name="fk_user">
                    @foreach ($users as $user)
                    @if (old('fk_user') == $user->id)
                    <option value="{{$user->id}}" selected>{{$user->nome}}
                    </option>
                    @else
                    <option value="{{$user->id}}">{{$user->nome}}</option>
                    @endif
                    @endforeach
                    <option value="selecione" selected>Selecione</option>
                  </select>
                  @error('fk_user','setor')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <!-- verifico se o tipo de usuário é cidadão, se for o campo do tipo usuário não vai ser mostrado-->
                <div class="form-group col-md-4" @foreach(Auth::user()->getRoleNames() as $nome) @if($nome=="cidadao") hidden @endif @endforeach>
                  <strong>Instrução <span style="color: red;">*</span></strong>
                  <input type="text" autocomplete="off" id="instrucao" name="instrucao" class="form-control @error('instrucao') is-invalid @enderror" value=" {{ old('instrucao') }}">
                  @error('instrucao')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
            </div>
            <!-- se o processo estiber bloqueado não pode alterar mais nada -->
            <div class="card-footer">
              <button type="button" form="tramite" class="btn btn-info float-right add_tramite" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>
                        &nbsp Aguarde...">Salvar</button>
            </div>

            <!-- /.card-footer -->
          </form>
        </div>
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
            // console.log(option);
            $("#select_secretaria").html(option).show();

        });
    });
</script>
<script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('js/base.js') }}"></script>
<script src="{{ asset('js/processo_tramitacao.js') }}"></script>
@endsection
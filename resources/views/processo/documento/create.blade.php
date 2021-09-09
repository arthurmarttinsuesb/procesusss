@extends('layouts.app')

 @section('htmlheader_title', 'Documento')
 @section('contentheader_title', 'Documento')

 @section('conteudo')
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h1>Adicionar ao Processo nº {{$processo->numero}} </h1>
          </div>
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Tela Inicial</a></li>
              <li class="breadcrumb-item active">Documento</li>
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

              <form  method="POST" id="documento" action="/documento">
                 @csrf
                <div class="card-body">
                      (<span style="color: red;">*</span>) Campos Obrigatórios
                      <br><br>
                       <div class="row">
                            <div class="form-group col-md-6">
                                <strong>Titulo <span style="color: red;">*</span></strong>
                                <input type="text" autocomplete="off" id="titulo" name="titulo" class="form-control @error('titulo') is-invalid @enderror" value="{{ old('titulo') }}">
                                <input type="hidden"  name="processo" value="{{$processo->id}}">
                                <input type="hidden"  name="processo_numero" value="{{$processo->numero}}">
                                @error('titulo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <strong>Modelo de Documento <span style="color: red;">*</span></strong>
                                <select id="tipo" name='tipo' class="form-control @error('tipo') is-invalid @enderror">
                                    <option value=''>Selecione</option>
                                    @foreach($tipo as $modelo_documento)
                                        <option value='{{$modelo_documento->id}}'>{{$modelo_documento->titulo}}</option>
                                    @endforeach
                                </select>
                                @error('tipo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @role('administrador|funcionario')
                            <div class="form-group col-md-2">
                                <strong>Conteúdo <span style="color: red;">*</span></strong>
                                <select id="categoria" name='categoria' class="form-control @error('tipo') is-invalid @enderror">
                                    <option value=''>Selecione</option>
                                    <option value='publico'>Público</option>
                                    <option value='privado'>Privado</option>
                                </select>
                            </div>
                            @endrole
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <strong>Descrição <span style="color: red;">*</span></strong>
                                <textarea class="textarea form-control @error('descricao') is-invalid @enderror" name='descricao'>{{ old('descricao') }}</textarea>
                                @error('descricao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <strong>Conteúdo <span style="color: red;">*</span></strong>

                                   <textarea class="textarea form-control @error('conteudo') is-invalid @enderror" name='conteudo' id='conteudo' placeholder="Place some text here"
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('conteudo') }}</textarea>
                                    @error('conteudo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" form="documento" class="btn btn-info float-right" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>
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
<script src="{{asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('js/base.js') }}"></script>
<script src="{{ asset('js/documento.js') }}"></script>
@endsection





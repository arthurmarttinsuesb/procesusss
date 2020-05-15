@extends('layouts.app')
 
 @section('htmlheader_title', 'Modelo Documento')
 @section('contentheader_title', 'Modelo Documento')
 
 @section('conteudo') 
 <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote.min.css') }}">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Adicionar Modelo Documento</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('listar_modelo')}}">Home</a></li>
              <li class="breadcrumb-item active">Modelo Documento</li>
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
                        <a href="{{ URL::to('listar_modelo') }}" class="btn btn-block btn-outline-info "><i class="fa fa-list-alt"></i> Listar Modelos</a>
                    </div>
              </div>
                 <div class="alert alert-danger erros" style="display: none;">
                    <strong>Atenção!</strong> Houve algum problema com as suas informações.<br><br>
                    <ul></ul>
                </div>
              <form  method="POST" action="/secretaria" id="form">
                <div class="card-body">
                      (<span style="color: red;">*</span>) Campos Obrigatórios
                      <br><br>
                       <div class="row">
                            <div class="form-group col-12">
                                <strong>Titulo</strong>
                                <input type="text" autocomplete="off" id="titulo" name="titulo" class="form-control" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <strong>Conteúdo</strong>
                                <div id='summernote'></div>
                            </div>
                        </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info float-right salvar" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>
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
    <!-- /.content -->
   <script src="{{asset('plugins/jquery/jquery.min.js') }}"></script>
   <script src="{{ asset('/plugins/summernote/summernote.min.js') }}"></script>
   <script src="{{ asset('js/base.js') }}"></script>
   <script src="{{ asset('js/modelo_documento.js') }}"></script>
@endsection




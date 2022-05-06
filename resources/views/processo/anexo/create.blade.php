@extends('layouts.app')

 @section('htmlheader_title', 'Anexo')
 @section('contentheader_title', 'Anexo')

 @section('conteudo')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h1>Adicionar Anexo ao Processo nº {{$processo->numero}} </h1>
          </div>
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Tela Inicial</a></li>
              <li class="breadcrumb-item active">Anexo</li>
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

                <form method="POST" id="anexo" action="/anexos/store/{{$processo->id}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        (<span style="color: red;">*</span>) Campos Obrigatórios
                        <br><br>
                        <div class="row">
                            <div class="form-group col-md-5">
                                <strong>Tipo <span style="color: red;">*</span></strong>
                                <input type="text" autocomplete="off" id="tipo" name="tipo" class="form-control">
                                <input type="hidden"  name="processo_numero" value="{{$processo->numero}}">
                            </div>
                            <div class="form-group col-md-4">
                                <strong>Arquivo <span style="color: red;">*</span></strong>
                                <input type="file" autocomplete="off" id="arquivo" name="arquivo" class="form-control">
                            </div>
                            @role('administrador|colaborador-nivel-2')
                            <div class="form-group col-md-3">
                                <strong>Conteúdo <span style="color: red;">*</span></strong>
                                <select id="categoria" name='categoria' class="form-control @error('tipo') is-invalid @enderror">
                                    <option value=''>Selecione</option>
                                    <option value='publico'>Público</option>
                                    <option value='privado'>Privado</option>
                                </select>
                            </div>
                            @endrole
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" form="anexo" class="btn btn-info float-right add_anexo" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>
                        &nbsp Aguarde...">Salvar</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->

          </div>
        </div>
    </section>
</div>


@endsection
@section('scripts-adicionais')
<script src="{{ asset('js/base.js') }}"></script>
<script src="{{ asset('js/documento.js') }}"></script>
@endsection





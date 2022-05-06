@extends('layouts.app')
 
 @section('htmlheader_title', 'Modelo Documento')
 @section('contentheader_title', 'Modelo Documento')
 
 @section('conteudo') 
 <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/iziToast/iziToast.min.css') }}">


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
              <li class="breadcrumb-item"><a href="{{route('listar_modelo')}}">Tela Inicial</a></li>
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
                <div class="float-right">
                  <a href="{{ route('listar_rifa') }}" class="btn btn-block btn-outline-info "><i class="fa fa-list-alt"></i> Listar Rifas</a>
                </div>
              </div>
              <div class="card-body">
                  <div class="alert alert-danger erros" style="display: none;">
                      <strong>Atenção!</strong> Houve algum problema com as suas informações.<br><br>
                      <ul></ul>
                  </div>
                  (<span style="color: red;">*</span>) Campos Obrigatórios
                  <br><br>
                  @if($modelo=="novo")
                    <form method="POST" id="form">
                            <div class="box-body">
                                <div class="form-group">
                                    <strong>Tipo</strong>
                                    <input type="text" autocomplete="off" id="tipo" 
                                    class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <strong>Conteúdo</strong>                   
                                    <div id="summernote"></div>
                                </div>
                            </div>  
                            <div class="modal-footer">
                                <button type="button" class="btn btn-action btn-success btnNovo" 
                                    data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>
                                    &nbsp Aguarde...">
                                    <span class="fa fa-save"></span> Salvar
                                </button>
                            </div> <!-- Fim de ModaL Footer-->
                        </form>
                    @else
                    @foreach($modelo as $modelos)
                        <form method="POST" id="form">
                            <div class="box-body">
                                <input type="hidden" id="id" name="id" value="{{$modelos->id ?? null}}">
                                <div class="form-group">
                                    <strong>Tipo</strong>
                                    <input type="text" name="tipo" autocomplete="off" id="tipo" 
                                    class="form-control" value="{{$modelos->tipo ?? null}}">
                                </div>
                                <div class="form-group">
                                    <strong>Conteúdo</strong>                   
                                    <div id="summernote"> <?php echo $modelos->conteudo; ?></div>
                                </div>
                            </div>  
                            <div class="modal-footer">
                                <button type="button" class="btn btn-action btn-success btnEditar" 
                                    data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>
                                    &nbsp Aguarde...">
                                    <span class="fa fa-save"></span> Salvar
                                </button>
                            </div> <!-- Fim de ModaL Footer-->
                        </form>
                    @endforeach   
                @endif     
            </div>

           </div>
          </div>
        </div>
    </section>
</div>
    <!-- /.content -->
   <script src="{{asset('plugins/jquery/jquery.min.js') }}"></script>
   <script src="{{ asset('/plugins/summernote/summernote.min.js') }}"></script>
   <script src="{{ asset('/plugins/iziToast/iziToast.min.js') }}"></script>
   <script src="{{ asset('js/base.js') }}"></script>
   <script src="{{ asset('js/modelo_documento.js') }}"></script>
@endsection


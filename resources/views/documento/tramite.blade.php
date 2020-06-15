@extends('layouts.app')
 
 @section('htmlheader_title', 'Documento')
 @section('contentheader_title', 'Documento')
 @section('conteudo') 
 <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h1>Encaminhar Documento {{$modelo->numero}} </h1>
          </div>
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Encaminhar Documento</li>
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
                        <a href="/processo/{{$modelo->fk_processo}}/edit" class="btn btn-block btn-outline-info "><i class="fa fa-undo-alt"></i> Retornar ao Processo</a>
                    </div>
              </div>
              @if (Session::has('message'))
              <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Atenção!</h5>
                     {{ Session::get('message') }}
                </div>
              @endif
           
              <form  method="POST" id="documento" action="/documento/store/{{$modelo->id}}">
                 @csrf
                <div class="card-body">
                      (<span style="color: red;">*</span>) Campos Obrigatórios
                      <br><br>
                         <div class="form-row">
                             <div class="form-group col-md-2">
                                    <strong>Assinatura <span style="color: red;">*</span></strong>
                                    <select  name="assinatura" id="assinatura" class="form-control select2 @error('assinatura') is-invalid @enderror" required>
                                       <option value="" >Selecione</option>
                                       <option value="true" >Sim</option>
                                       <option value="false" >Não</option>
                                    </select>
                                    <input type="hidden"  name="processo" value="{{$modelo->fk_processo}}">
                                    @error('assinatura')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                              </div>
                              <div class="form-group col-md-2">
                                    <strong>Enviar Para <span style="color: red;">*</span></strong>
                                    <select  name="envio" id="envio" class="form-control select2 @error('envio') is-invalid @enderror" required>
                                       <option value="" >Selecione</option>
                                       <option value="setor" >Setor</option>
                                       <option value="colaborador" >Colaborador</option>
                                    </select>
                                    @error('envio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                              </div>
                              <div class="form-group col-md-8 setor" style='display:none'>
                                    <strong>Setor <span style="color: red;">*</span></strong>
                                    <select  name="setor[]" class="form-control select2 @error('setor') is-invalid @enderror" multiple="multiple">
                                        @inject('setor','App\Setor')
                                        @foreach($secretaria as $secretarias)
                                            <optgroup label="{{$secretarias->titulo}}" >
                                                @foreach($setor->where('fk_secretaria',$secretarias->id)->get() as $setores)
                                                    <option value="{{$setores->id}}" >{{$setores->titulo}}</option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                    @error('setor')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                              </div>
                              <div class="form-group col-md-8 colaborador" style='display:none'>
                                    <strong>Colaborador <span style="color: red;">*</span></strong>
                                    <select  name="usuario[]" class="form-control select2 @error('usuario') is-invalid @enderror" multiple="multiple">
                                    <option value="" >Selecione..</option>
                                    @foreach($usuario as $usuarios)
                                        <option value="{{$usuarios->id}}">{{$usuarios->nome}}</option>
                                    @endforeach
                                    </select>
                                    @error('usuario')
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
<script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('js/base.js') }}"></script>
<script src="{{ asset('js/tramite.js') }}"></script>
@endsection





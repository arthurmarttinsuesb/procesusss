@extends('layouts.app')

 @section('htmlheader_title', 'Devolutiva')
 @section('contentheader_title', 'Devolutiva')

 @section('conteudo')
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h1>Adicionar observação ao documento:  </h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

 <!-- Main content -->
 <section class="content">
      <div class="row">
        <div class="col-12">

           <div class="card">

              @if (Session::has('message'))
              <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Atenção!</h5>
                     {{ Session::get('message') }}
                </div>
              @endif

              <form  method="POST" action="/devolutiva" >
                 @csrf

                <div class="card-body">
                      (<span style="color: red;">*</span>) Campos Obrigatórios
                      <br><br>

                        <div class="row">
                            <div class="form-group col-12">
                                <strong>Observação <span style="color: red;">*</span></strong>
                                <input type="hidden"  name="documento" value='{{$id}}'>
                                <textarea class="textarea form-control @error('Observação') is-invalid @enderror" name='Observação'>{{ old('Observação') }}</textarea>
                                @error('Observação')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit"  class="btn btn-info float-right" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>
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
<script src="{{asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/base.js') }}"></script>
    <script src="{{ asset('js/home.js') }}"></script>
@endsection





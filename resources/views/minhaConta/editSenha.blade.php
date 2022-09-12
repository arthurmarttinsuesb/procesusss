@extends('layouts.app')

@section('htmlheader_title', 'Minha conta')
@section('contentheader_title', 'Minha conta')

<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

@section('conteudo')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Trocar Senha</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Tela Inicial</a></li>
                        <li class="breadcrumb-item active">Minha conta</li>
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
                                <a href="{{ URL::to('conta') }}" class="btn btn-block btn-outline-info "><i
                                    class="fa fa-list-alt"></i>Minha conta</a>
                            
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
                        <form method="POST" action="/conta/{{$usuario->id}}" id="change-password" >
                            @csrf
                            @method('PUT')
                           
                                <div class="row">
                                    <div class="form-group col-4">
                                        <strong>Senha Atual<span style="color: red;">*</span></strong>
                                        <input type="password" autocomplete="off" id="password_current" name="password_current" class="form-control @error('password_current') is-invalid @enderror" value="{{ old('password_current') }}"  minlength="8" required>
                                        @error('senha')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-4">
                                        <strong>Nova Senha<span style="color: red;">* (Minimo de 8 caracteres)</span></strong>
                                        <input type="password" autocomplete="off" id="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}"  minlength="8" required>
                                        @error('senha')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>   
                                    
                                    
                                   
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </form>
                    </div>
                    <div class="card-footer">
                        <button type="submit" form="change-password" class="btn btn-info float-right" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>
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
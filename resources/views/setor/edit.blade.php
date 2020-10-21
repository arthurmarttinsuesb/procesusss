@extends('layouts.app')

@section('htmlheader_title', 'Setor')
@section('contentheader_title', 'Setor')

@section('conteudo')
<link rel="stylesheet" href="{{ asset('plugins/summernote/summernote.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/iziToast/iziToast.min.css') }}">


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar Setor: {{ $setor->titulo }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Setor</li>
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
                        <div class="row">
                            <div class="col-xl-10 col-sm-9">
                            </div>
                            <div class="col-xl-2 col-sm-3">
                                <a href="{{ URL::to('setor') }}" class="btn btn-block btn-outline-info "><i class="fa fa-list-alt"></i> Listar Setor</a>
                            </div>
                        </div>
                    </div>

                    @if (Session::has('message'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-ban"></i> Atenção!</h5>
                        {{ Session::get('message') }}
                    </div>
                    @endif
                    <form method="POST" action="/setor/{{$setor->id}}" id="setor">
                        @csrf
                        @method('PUT')


                        <div class="card-body">
                            (<span style="color: red;">*</span>) Campos Obrigatórios
                            <br><br>
                            <div class="row">
                                <div class="form-group col-6">
                                    <strong>Titulo <span style="color: red;">*</span></strong>
                                    <input value="{{ old('titulo', $setor->titulo) }}" type="text" autocomplete="off" id="titulo" name="titulo" class="form-control @error('titulo', 'setor') is-invalid @enderror">
                                    @error('titulo','setor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <strong>Sigla <span style="color: red;">*</span></strong>
                                    <input value="{{ old('sigla', $setor->sigla) }}" type="text" autocomplete="off" id="sigla" name="sigla" class="form-control @error('sigla', 'setor') is-invalid @enderror">
                                    @error('sigla','setor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <strong>Secretaria <span style="color: red;">*</span></strong>
                                    <select class="form-control select2 form-control @error('fk_secretaria', 'setor') is-invalid @enderror" name="fk_secretaria">


                                        @foreach ($secretarias as $secretaria)
                                        @if (old('fk_secretaria', $setor->fk_secretaria) == $secretaria->id)
                                        <option value="{{$secretaria->id}}" selected>{{$secretaria->titulo}}</option>
                                        @else
                                        <option value="{{$secretaria->id}}">{{$secretaria->titulo}}</option>
                                        @endif

                                        @endforeach
                                    </select>
                                    @error('fk_secretaria','setor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                    </form>

                    <!-- /.card-body -->
                </div>
                <div class="card-footer">
                    <button type="submit" form="setor" class="btn btn-info float-right salvar" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>
                    &nbsp Aguarde...">Salvar</button>
                    <!-- /.card-footer -->
                </div>

                <!-- /.card -->
            </div>
        </div>
    </section>
</div>
@endsection

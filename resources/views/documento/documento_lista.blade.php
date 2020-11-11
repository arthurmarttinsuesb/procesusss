@extends('layouts.app')

@section('htmlheader_title', 'Documento')
@section('contentheader_title', 'Documento')

@section('conteudo')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Documento Recebidos</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Documento Recebidos</li>
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
                            <div class="col-xl-9 col-sm-1">
                            </div>
                            <div class="col-xl-3 col-sm-11">
                                
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    @if (Session::has('message'))
                    <div class="alert alert-info m-2">{{ Session::get('message') }}</div>
                    @endif
                    <div class="card-body table-responsive-sm">
                    @if(Auth::user()->hasRole('administrador') || Auth::user()->hasRole('funcionario') )
                        
                        <table id="table_documento_lista" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Documento</th>
                                    <th>Descrição</th>
                                    <th>Data de Abertura</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($documento as $documentos)
                                    <tr>
                                        <td>{{$documentos->processo_documento->titulo}}</td>
                                        <td>{{$documentos->processo_documento->descricao}}</td>
                                        <td>{{date('d/m/Y H:i', strtotime($documentos->created_at))}}</td>
                                        <td>@if($documentos->assinatura == TRUE)
                                        <div class="btn-group btn-group-sm">
                                            <button type='button' class="btn bg-success color-palette btnAssinar"
                                            data-id="{{$documentos->id}}" title="Assinar Documento" data-toggle="tooltip"><i class="fa fa-pencil-alt"></i></i> Assinar
                                            </button>
                                            <a href="/pdf/documento/{{$documentos->processo_documento->id}}" target='_blank' class="btn bg-info color-palette" title="Visualizar Documento Completo"
                                                data-toggle="tooltip"><i class="fa fa-eye"></i> Visualizar
                                            </a>
                                        </div>
                                        @else
                                        <div class="btn-group btn-group-sm">
                                            <button type='button' class="btn bg-success color-palette btnAssinar"
                                            data-id="{{$documentos->id}}" title="Marcar documento como lido" data-toggle="tooltip"><i class="fa fa-envelope-open-text"></i></i> Marcar como lido
                                            </button>
                                            <a href="/pdf/documento/" target='_blank' class="btn bg-info color-palette" title="Visualizar Documento Completo"
                                                data-toggle="tooltip"><i class="fa fa-eye"></i> Visualizar
                                            </a>
                                        </div>

                                    @endif</td>
                                    </tr>
                                @endforeach    
                            </tbody>
                        </table>

                    @endif
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <!-- /.row -->
    </section>
</div>
@include('processo.modal_processo')
<!-- /.content -->
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/base.js') }}"></script>

@endsection

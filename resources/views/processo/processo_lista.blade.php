@extends('layouts.app')

@section('htmlheader_title', 'Processo')
@section('contentheader_title', 'Processo')

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
                    <h1>Processos Recebidos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Tela Inicial</a></li>
                        <li class="breadcrumb-item active">Processos Recebidos</li>
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
                        
                        <table id="table_processo_lista" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Número Processo</th>
                                    <th>Tipo de Processo</th>
                                    <th>Criado por</th>
                                    <th>Data de Abertura</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($processo as $processos)
                                    <tr>
                                        <td>{{$processos->processo->numero}}</td>
                                        <td>{{$processos->processo->tipo}}</td>
                                        
                                        <td>{{$processos->processo->user->nome}}</td>
                                        <td>{{date('d/m/Y H:i', strtotime($processos->created_at))}}</td>
                                        <td><div class="btn-group btn-group-sm">
                                            <a href="/processo/{{$processos->processo->id}}/edit" class="btn bg-info color-palette" title="Visualizar Documento Completo"
                                                data-toggle="tooltip"><i class="fa fa-eye"></i> Acessar
                                            </a>
                                        </div></td>
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

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
                    <h1>Gerenciar Meus Processos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Processos</li>
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
                        <div class="col-3 float-right">
                            <button data-toggle="modal" data-target="#modal-processo"
                                class="btn btn-block btn-outline-info"><i class="fa fa-plus"></i> Adicionar
                                Processo</button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    @if (Session::has('message'))
                    <div class="alert alert-info m-2">{{ Session::get('message') }}</div>
                    @endif
                    <div class="card-body">
                        <table id="table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Número Processo</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                        </table>
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
<script src="{{ asset('js/listar_processo.js') }}"></script>
@endsection
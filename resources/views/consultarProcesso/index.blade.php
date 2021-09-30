@extends('layouts.app')

@section('htmlheader_title', 'Consultar Processo')
@section('contentheader_title', 'Consultar Processo')

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
                    <h1>Consultar Processo</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Tela Inicial</a></li>
                        <li class="breadcrumb-item active">Consultar Processo</li>
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
                    <form method="POST" class="busca_processo_form" action="">
                    <div class="form-group row">
                        
                            <div class="col-sm-6">
                                <input  data-toggle="tooltip" data-placement="top" placeholder="Digite o Nº ou Autor(a) do Processo" type="text" autocomplete="off" class="form-control" id='campo_busca' />
                            </div>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-info float-left busca_processo" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>&nbsp Aguarde..."> <i class='fa fa-search'></i> Buscar</button>
                            </div>
                        
                    </div>
                    </form>

                    </div>
                    @if (Session::has('message'))
                    <div class="alert alert-info m-2">{{ Session::get('message') }}</div>
                    @endif
                    <!-- /.card-header -->

                    <div class="card-body table-responsive-sm">
                        <table id="table_processos" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Autor(a)</th>
                                    <th>Numero</th>
                                    <th>Título</th>
                                    <th>Descrição</th>
                                    <th>Encaminhamento</th>
                                    <th>Status</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <!-- /.row -->
    </section>
</div>
<!-- /.content -->
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/base.js') }}"></script>
<script src="{{ asset('js/consultar-processo.js') }}"></script>
@endsection

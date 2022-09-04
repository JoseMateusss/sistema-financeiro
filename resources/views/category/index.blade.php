@extends('adminlte::page')

@section('title', 'Categorias')

@section('css')
    <link rel="stylesheet" href="//adminlte.io/themes/v3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@stop

@section('content_header')
<div class="d-flex">
    <div class="col-10">
        <h1 class="m-0 text-dark">Categorias</h1>
    </div>
    <div class="col-2">
        @can('Criar Categoria')
            <a href="{{ route('categories.create') }}" class="btn btn-block btn-success">Nova Categoria</a>
        @endcan
    </div>
</div>
@stop

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body" id="example1_wrapper">
                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                    <thead>
                        <tr>
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Nome</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Descrição</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="">Status</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="">Data de criação</th>

                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Ação</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')

<script src="//adminlte.io/themes/v3/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="//adminlte.io/themes/v3/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="//adminlte.io/themes/v3/plugins/jszip/jszip.min.js"></script>
<script src="//adminlte.io/themes/v3/plugins/pdfmake/pdfmake.min.js"></script>
<script src="//adminlte.io/themes/v3/plugins/pdfmake/vfs_fonts.js"></script>
<script src="//adminlte.io/themes/v3/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="//adminlte.io/themes/v3/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="//adminlte.io/themes/v3/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
    $(function () {
        $("#example1").DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: "{{route('categories.index')}}",
            dataType: 'json',
            type: "POST",
            columns: [{
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'description',
                    name: 'description',
                },
                {
                    data: 'status',
                    name: 'status',
                    searchable: false,
                    orderable: false
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                },
                {
                    data: 'actions',
                    name: 'actions',
                    searchable: false,
                    orderable: false
                }
            ],
        });
    });

    </script>
@stop

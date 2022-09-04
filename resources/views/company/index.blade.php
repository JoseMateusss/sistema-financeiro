@extends('adminlte::page')

@section('title', 'Empresas')

@section('css')
<link rel="stylesheet" href="//adminlte.io/themes/v3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@stop

@section('content_header')
<div class="d-flex">
    <div class="col-10">
        <h1 class="m-0 text-dark">Empresas</h1>
    </div>
    <div class="col-2">
        <a href="{{ route('companies.create') }}" class="btn btn-block btn-success">Adicionar empresa</a>
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
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" aria-sort="ascending">CNPJ</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="">Nome</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="">Data de criação</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($companies as $company)
                        <tr class="even">
                            <td>{{ $company->cnpj }}</td>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->created_at }}</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('companies.edit', ['company' => $company->id]) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
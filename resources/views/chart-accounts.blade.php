@extends('adminlte::page')

@section('title', 'Plano de contas')

@section('css')
<link rel="stylesheet" href="//adminlte.io/themes/v3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@stop

@section('content_header')
<div class="d-flex align-items-center mb-3">
    <div class="col-4">
        <h1 class="m-0 text-dark">Plano de contas</h1>
    </div>
    <div class="col-8 text-right">
        <a href="{{ route('categories.index') }}" class="btn btn-warning"><i class="fas fa-folder-open mr-2"></i>Categorias</a>
        <a href="{{ route('subcategories.index') }}" class="btn btn-info"><i class="fas fa-folder mr-2"></i>Subcategorias</a>
    </div>
</div>
@stop

@section('content')
@foreach($companies as $company)
    <div class="card card-outline">
        <div class="card-body">
            <div class="header d-flex justify-content-between align-items-center">
                <h4>{{ $company->name }}</h4>
                <a href="" class="btn btn-success"><i class="fas fa-download mr-2"></i>Exportar</a>
            </div>
            <hr>
            @foreach($company->categories as $category)
                <ul>
                    <li><h5>{{ $category->name }}</h5>
                        <ul>
                        @foreach($category->subcategories as $subcategory)
                            <li><p class="lead">{{ $subcategory->name }}</p></li>
                        @endforeach
                        </ul>
                    </li>
                </ul>
            @endforeach
        </div>

    </div>
@endforeach
@stop

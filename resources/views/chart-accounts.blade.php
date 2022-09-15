@extends('adminlte::page')

@section('title', 'Plano de contas')

@section('css')
<link rel="stylesheet" href="//adminlte.io/themes/v3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@stop

@section('content_header')
<div class="d-flex">
    <div class="col-8">
        <h1 class="m-0 text-dark">Plano de contas</h1>
    </div>
    <div class="col-4 text-right">
            <a href="{{ route('categories.index') }}" class="btn btn-warning"><i class="fas fa-folder-open mr-2"></i>Categorias</a>
            <a href="{{ route('subcategories.index') }}" class="btn btn-info"><i class="fas fa-folder mr-2"></i>Subcategorias</a>
    </div>
</div>
@stop

@section('content')
@foreach($companies as $company)
    <div class="card card-primary card-outline">
        <div class="card-body">
            <h4>{{ $company->name }}</h4>
            <div class="row">
                <div class="col-5 col-sm-3">
                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
                        aria-orientation="vertical">
                        @foreach($company->categories as $category)
                            <a class="nav-link" id="vert-tabs-{{$category->id}}-tab" data-toggle="pill" href="#vert-tabs-{{$category->id}}" role="tab"
                                aria-controls="vert-tabs-{{$category->id}}" aria-selected="false">{{ $category->name }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="col-7 col-sm-9">
                    <div class="tab-content" id="vert-tabs-tabContent">
                        @foreach($company->categories as $category)
                            <div class="tab-pane fade" id="vert-tabs-{{$category->id}}" role="tabpanel"
                                aria-labelledby="vert-tabs-{{$category->id}}-tab">
                                @foreach($category->subcategories as $subcategory)
                                    <div class="pb-3">
                                        <a href="" class="" style="color:black; font-size:16px;"><i class="fas fa-plus mr-2"></i>{{$subcategory->name}} - {{$subcategory->description}}</a>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
@endforeach
@stop

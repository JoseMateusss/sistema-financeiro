@extends('adminlte::page')

@section('title', 'Plano de contas')

@section('css')
<link rel="stylesheet" href="//adminlte.io/themes/v3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@stop

@section('content_header')
<div class="d-flex align-items-center mb-2">
    <div class="col-4">
        <h1 class="m-0 text-dark">Plano de contas</h1>
    </div>
    <div class="col-8 text-right">
        <a href="{{ route('categories.index') }}" class="btn btn-warning shadow"><i class="fas fa-folder-open mr-2"></i>Categorias</a>
    </div>
</div>
@stop

@section('content')
@livewire('chart-account.index')
@stop

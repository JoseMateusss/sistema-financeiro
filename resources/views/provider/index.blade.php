@extends('adminlte::page')

@section('title', 'Fornecedores')

@section('css')
<link rel="stylesheet" href="//adminlte.io/themes/v3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@stop

@section('content_header')
<div class="d-flex">
    <div class="col-10">
        <h1 class="m-0 text-dark">Fornecedores</h1>
    </div>
    <div class="col-2">
        <a href="{{ route('providers.create') }}" class="btn btn-block btn-success shadow">Novo fornecedor</a>
    </div>
</div>
@stop

@section('content')
@livewire('provider.index')
@stop
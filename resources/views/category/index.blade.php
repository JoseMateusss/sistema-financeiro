@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <div class="d-flex">
        <div class="col-10">
            <h1 class="m-0 text-dark">Categorias</h1>
        </div>
        <div class="col-2">
            <a href="{{ route('category.create') }}" class="btn btn-block btn-success">Nova Categoria</a>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">You are logged in!</p>
                </div>
            </div>
        </div>
    </div>
@stop
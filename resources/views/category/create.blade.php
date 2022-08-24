@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <div class="d-flex">
        <div class="col-8">
            <h1 class="m-0 text-dark">Cadastro de categoria</h1>
        </div>
        <div class="col-4">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Categorias</a></li>
                <li class="breadcrumb-item active">Nova Categoria</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" id="name" placeholder="Nome da categoria">
                        </div>
                        <div class="form-group">
                            <label for="description">Descrição</label>
                            <textarea class="form-control" id="description" rows="3" placeholder="Descrição ..."></textarea>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="status" checked>
                            <label class="form-check-label" for="status">Ativa</label>
                        </div>
                    </div>
                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Criar Categoria</button>
                    </div>
                    </form>
            </div>
        </div>
    </div>
@stop
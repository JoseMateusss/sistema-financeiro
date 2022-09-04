@extends('adminlte::page')

@section('title', 'Cadastro de empresa')

@section('content_header')
    <div class="d-flex">
        <div class="col-8">
            <h1 class="m-0 text-dark">Cadastro de empresa</h1>
        </div>
        <div class="col-4">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('companies.index') }}">Empresas</a></li>
                <li class="breadcrumb-item active">Adicionar empresa</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('companies.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="description">CNPJ</label>
                            <input type="text" class="form-control @error('cnpj') is-invalid @enderror" id="cnpj" name="cnpj" value="{{old('cnpj')}}" placeholder="Nome da categoria">
                            @error('cnpj') 
                                <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}" placeholder="Nome da categoria">
                            @error('name') 
                                <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                    </div>
                    </form>
            </div>
        </div>
    </div>
@stop
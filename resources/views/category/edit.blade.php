@extends('adminlte::page')

@section('title', 'Editar categoria')

@section('content_header')
    <div class="d-flex">
        <div class="col-8">
            <h1 class="m-0 text-dark">Editar categoria</h1>
        </div>
        <div class="col-4">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categorias</a></li>
                <li class="breadcrumb-item active">Editar Categoria</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST">
                        @method("PATCH")
                        @csrf
                        <div class="form-group">
                            <label for="company_id">Empresa</label>
                            <select class="form-control select2 select2-hidden-accessible @error('company_id') is-invalid @enderror" name="company_id" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                @foreach ($companies as $company )
                                    <option value="{{ $company->id }}" {{ $category->company_id === $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                                @endforeach
                            </select>
                            @error('company_id')
                                <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') ?? $category->name }}" placeholder="Nome da categoria">
                            @error('name')
                                <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Descrição</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" placeholder="Descrição ...">{{ old('description') ?? $category->description }}</textarea>
                            @error('description')
                                <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="status" name="status" {{ $category->status ? 'checked' : ' '  }}>
                                <label class="custom-control-label" for="status">Categoria ativa</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Salvar alterações</button>
                    </div>
                    </form>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script>
        $(function () {
            $('.select2').select2();
        })
    </script>
@stop

@extends('adminlte::page')

@section('title', 'Editar usuário')

@section('content_header')
    <div class="d-flex">
        <div class="col-8">
            <h1 class="m-0 text-dark">Editar usuário</h1>
        </div>
        <div class="col-4">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuários</a></li>
                <li class="breadcrumb-item active">Editar usuário</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4>Informações de perfil</h4>
                    <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
                        @method("PATCH")
                        @csrf
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') ?? $user->name }}" placeholder="Nome do usuário">
                            @error('name')
                                <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') ?? $user->email }}" placeholder="E-mail do usuário">
                            @error('email')
                                <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="role">Grupo de acesso</label>
                            <select class="form-control select2 select2-hidden-accessible @error('role') is-invalid @enderror" name="role" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                @foreach ($roles as $role )
                                    <option value="{{ $role->id }}" {{ $user->roles->first()->id === $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role')
                                <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Empresas</label>
                            <select class="select2 select2-hidden-accessible @error('companies') is-invalid @enderror" name="companies[]" multiple data-placeholder="Selecionar empresas" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}"
                                        @foreach ($user->companies as $companySelected )
                                            {{ $company->id ===  $companySelected->id ? 'selected' : ''}}
                                        @endforeach>
                                        {{ $company->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('companies')
                                <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Salvar alterações</button>
                        </div>
                    </form>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4>Alterar senha</h4>
                    <form action="{{ route('users.changepassword', ['user' => $user->id]) }}" method="POST">
                        @method("PATCH")
                        @csrf
                        <div class="form-group">
                            <label for="password">Nova senha</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="" placeholder="Nova senha">
                            @error('password')
                                <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Confirmar nova senha</label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" value="" placeholder="Confirmar nova senha">
                            @error('password_confirmation')
                                <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Salvar nova senha</button>
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

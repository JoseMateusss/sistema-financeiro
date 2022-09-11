@extends('adminlte::page')

@section('title', 'Usuários')

@section('css')
    <link rel="stylesheet" href="//adminlte.io/themes/v3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@stop

@section('content_header')
    <div class="d-flex">
        <div class="col-10">
            <h1 class="m-0 text-dark">Usuários</h1>
        </div>
        <div class="col-2">
            <a href="{{ route('users.create') }}" class="btn btn-block btn-success">Novo usuário</a>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body" id="example1_wrapper">
                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                        aria-describedby="example1_info">
                        <thead>
                            <tr>
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                    aria-sort="ascending">Nome</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    style="">E-mail</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    style="">Grupo de acesso</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    style="">Data de criação</th>
                                <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    style="">Ação</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modal-default" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Remover usuário</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form>
                    @csrf
                    <div class="modal-body">
                        <h5>Você tem certeza que deseja remover <b><span id="user_name"></span></b>?</h5>
                        <p>O usuário será desativado do sistema, o cadastro ainda será mantido</p>
                        <input type="hidden" name="user_id" id="user_id">

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="" onclick="deleterUserModal()" class="btn btn-danger">Remover</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
@stop

@section('js')
    <script>
        $(function() {
            $("#example1").DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{{ route('users.index') }}",
                dataType: 'json',
                type: "POST",
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email',
                    },
                    {
                        data: 'role',
                        name: 'role',
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        searchable: false,
                        orderable: false
                    }
                ],
            });
        });


        function teste(id, name) {
            event.preventDefault();
            $('#user_id').val(id);
            $('#user_name').text(name);
            $('#modal-default').modal('show');
        }

        function deleterUserModal(){
            event.preventDefault();
            var id = $('input[name=user_id]').val()
            $.ajax({
                url:'http://127.0.0.1:8000/users/'+id,
                type:'DELETE',
                data:{
                    _token: $('input[name=_token]').val()
                },
                success:function(responser){
                    $('#example1').DataTable().ajax.reload();
                    $('#modal-default').modal('hide');
                    flasher.success("Usuário removido com sucesso!", "Sucesso");
                },
                error: function(responser){
                    $('#modal-default').modal('hide');
                    flasher.error("Erro ao tentar remover usuário!", "Erro");
                }
            });
        }
    </script>
@stop

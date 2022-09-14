@extends('adminlte::page')

@section('title', 'Categorias')

@section('css')
    <link rel="stylesheet" href="//adminlte.io/themes/v3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@stop

@section('content_header')
<div class="d-flex">
    <div class="col-8">
        <h1 class="m-0 text-dark">Categorias</h1>
    </div>
    <div class="col-4 text-right">
        @can('Criar Categorias')
            <a href="{{ route('categories.create') }}" class="btn btn-warning"><i class="fas fa-folder mr-2"></i>Subcategorias</a>
            <a href="{{ route('categories.create') }}" class="btn btn-success"><i class="fas fa-plus mr-2"></i>  Nova categoria</a>
        @endcan
    </div>
</div>
@stop

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body" id="example1_wrapper">
                <table id="table_category" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                    <thead>
                        <tr>
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending">Nome</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Descrição</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Empresa</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Status</th>
                            <th tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Ação</th>
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
                <h4 class="modal-title">Excluir categoria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form>
                @csrf
                <div class="modal-body">
                    <h5>Você tem certeza que deseja excluir a categoria <b><span id="category_name"></span></b>?</h5>
                    <input type="hidden" name="category_id" id="category_id">

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="" onclick="deleteCategory()" class="btn btn-danger">Excluir</button>
                </div>
            </form>
        </div>

    </div>

</div>
@stop

@section('js')
<script>
    $(function () {
        $("#table_category").DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: "{{route('categories.index')}}",
            dataType: 'json',
            type: "POST",
            columns: [{
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'description',
                    name: 'description',
                },
                {
                    data: 'company_id',
                    name: 'company_id',
                },
                {
                    data: 'status',
                    name: 'status',
                    searchable: false,
                    orderable: false
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

    function deleteCategoryModal(id, name) {
        event.preventDefault();
        $('#category_id').val(id);
        $('#category_name').text(name);
        $('#modal-default').modal('show');
    }
    function deleteCategory(){
            event.preventDefault();
            var id = $('input[name=category_id]').val()
            $.ajax({
                url:'http://127.0.0.1:8000/categories/'+id,
                type:'DELETE',
                data:{
                    _token: $('input[name=_token]').val()
                },
                success:function(responser){
                    $('#table_category').DataTable().ajax.reload();
                    $('#modal-default').modal('hide');
                    flasher.success("Categoria excluida com sucesso!", "Sucesso");
                },
                error: function(responser){
                    $('#modal-default').modal('hide');
                    flasher.error("Erro ao tentar excluir categoria!", "Erro");
                }
            });
        }


</script>
@stop

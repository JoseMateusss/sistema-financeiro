@can('Editar Categorias')
<div class="btn-group btn-group-sm">
    <a href="{{ route('categories.edit', ['category' => $id]) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
    <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
</div>
@endcan

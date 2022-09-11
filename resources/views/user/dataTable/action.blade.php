<div class="btn-group btn-group-sm">
    <a href="{{ route('users.edit', ['user' => $id]) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
    <button type="button"  class="btn btn-danger" onclick="teste({{ $id }},'{{ $name }}')" id="deleteUserButton"><i class="fas fa-trash"></i></button>
</div>


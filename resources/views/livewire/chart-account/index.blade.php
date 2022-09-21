<div>
    @foreach($companies as $company)
    <div class="card card-outline">
        <div class="card-body">
            <div class="header d-flex justify-content-between align-items-center mb-3">
                <h4>{{ $company->name }}</h4>
                <a href="" class="btn btn-success shadow"><i class="fas fa-download mr-2"></i>Exportar</a>
            </div>
            @php
            $n = 1;
            $n2 = 1;
            @endphp
            @foreach($company->categories as $category)
            <ul style="list-style: none">
                <li>
                    <h5>{{$n }}. {{ $category->name }}</h5>
                    <ul style="list-style: none">
                        @foreach($category->subcategories as $subcategory)
                        <li class="d-flex justify-content-between align-items-center">
                            <p class="lead">{{$n}}.{{ $n2 }}. {{ $subcategory->name }}</p>
                        </li>
                        <hr style="margin-top:0px; margin-bottom:5px;">
                        @php
                        $n2++
                        @endphp
                        @endforeach
                    </ul>
                </li>
            </ul>
            <div class="d-flex justify-content-center">
                <button class="btn btn-dark btn-sm rounded-circle shadow"
                    wire:click="doSomething({{ $category->id }})"><i class="fas fa-plus"></i></button>
            </div>
            @php
            $n++;
            $n2 = 1;
            @endphp
            @endforeach
        </div>

    </div>
    @endforeach
    <div class="modal" id="modal-default" aria-modal="true" role="dialog" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Adicionar subcategoria</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form wire:submit.prevent="saveSubcategory">
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" wire:model.defer="name" placeholder="Nome da categoria">
                            @error('name')
                            <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Descrição</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" wire:model.defer="description" rows="2"
                                placeholder="Descrição ..."></textarea>
                            @error('description')
                            <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submite" class="btn btn-success">Salvar</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>
    @section('js')
    <script>
    window.addEventListener('show-form', event => {
        $('#modal-default').modal('show');
        document.getElementById("name").focus();
    });
    window.addEventListener('hide-form', event => {
        $('#modal-default').modal('hide');
        flasher.success("Nova subcategoria adicionada!", "Sucesso");
    });
    </script>
    @endsection
</div>
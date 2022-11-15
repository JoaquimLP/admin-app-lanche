<a class="btn btn-sm bg-gradient-info" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Nova Categoria
</a>
<div wire:ignore.self class="collapse" id="collapseExample">
    @include('livewire.admin.categoria.form')
    <button type="button" wire:click="store" class="btn btn-sm btn-info">Salvar</button>
</div>

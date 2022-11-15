
<a class="btn btn-sm bg-gradient-info" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Novo Ingrediente
</a>
<div wire:ignore.self class="collapse" id="collapseExample">
    @include('livewire.admin.ingrediente.form')
    <button type="button" wire:click="store" class="btn btn-sm btn-info">Salvar</button>
</div>


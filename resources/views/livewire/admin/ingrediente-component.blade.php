<div class="card p-2">
    <div class="row col-12">
        <div wire:ignore.self class="col-12 col-md-3">
            @include('livewire.admin.ingrediente.'. $acao)
        </div>
        <div class="col-12 col-md-9">
            @include('livewire.admin.ingrediente.table')
            <div class="mt-2">
                {{ $ingredientes->links() }}
            </div>
        </div>
    </div>
</div>

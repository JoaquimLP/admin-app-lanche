<div class="card p-2">
    <div class="row col-12">
        <div class="col-12 col-md-3">
            @include('livewire.admin.categoria.'. $acao)
        </div>
        <div class="col-12 col-md-9">
            @include('livewire.admin.categoria.table')
            <div class="mt-2">
                {{ $categorias->links() }}
            </div>
        </div>
    </div>
</div>

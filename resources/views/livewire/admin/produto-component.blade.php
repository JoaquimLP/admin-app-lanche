<div class="card">
    <div class="row col-12">
        <div wire:ignore class="col-12 m-1">
            <button type="button" wire:click="resetInput" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modal-create">
                Novo Produto
            </button>
            @include('livewire.admin.produto.create')
        </div>
        <div class="col-12">
            @include('livewire.admin.produto.table')
            <div class="mt-2">
                {{ $produtos->links() }}
            </div>
        </div>
    </div>
    @include('livewire.admin.produto.edit')
    @include('livewire.admin.produto.show')
</div>
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.money').mask('#.##0,00', {reverse: true});

        Livewire.on('onCloseModal', e => {
            var myModalEl = document.getElementById('modal-create');
            var modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        })

        Livewire.on('onCloseModalEdit', e => {
            var myModalEl = document.getElementById('modal-edit');
            var modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        })

        /* $(document).ready(function(){
            $("#modal-create").on('hidden.bs.modal', function(){
                livewire.emit('onCloseModal');
            });
        }); */
    </script>
@endpush

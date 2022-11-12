<!-- Modal -->
<div wire:ignore.self class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="modal-edit-Label"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="modal-edit-Label">Editar Produto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    @include('livewire.admin.produto.form')
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="resetInput" class="btn btn-sm bg-gradient-secondary" data-bs-dismiss="modal">Voltar</button>
                <button type="button" wire:click="update({{$produto_id}})" class="btn btn-sm btn-info">Salvar</button>
            </div>
        </div>
    </div>
</div>

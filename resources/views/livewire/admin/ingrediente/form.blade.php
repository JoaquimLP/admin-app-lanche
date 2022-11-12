<div class="mb-3">
    <label for="_nome" class="form-label">Nome</label>
    <input type="text" wire:model="nome" name="nome" class="form-control" id="_nome" placeholder="Lanche">
    @error('nome')
    <span class="is-invalid">{{$message}}</span>
    @enderror
</div>
<div class="mb-3">
    <label for="_descricao" class="form-label">Descrição</label>
    <textarea class="form-control" name="descricao" wire:model="descricao" id="_descricao" rows="3"></textarea>
    @error('descricao')
    <span class="is-invalid">{{$message}}</span>
    @enderror
</div>

<div class="col-12 mb-3">
    <div class="input-group mb-0">
        <span class="input-group-text" id="_nome">Produto</span>
        <input type="text" wire:model="nome" name="nome" class="form-control" placeholder="Nome" aria-label="Nome" aria-describedby="basic-addon1">
    </div>
    @error('nome')
        <span class="is-invalid">{{$message}}</span>
    @enderror
</div>
<div class="col-6 mb-3">
    <div class="input-group mb-0">
        <span class="input-group-text" id="_preco">Preço</span>
        <input type="text" wire:model="preco" name="preco" class="form-control money" placeholder="00,00" aria-label="preco" aria-describedby="basic-addon1">
    </div>
    @error('preco')
        <span class="is-invalid">{{$message}}</span>
    @enderror
</div>
<div class="col-12 mb-3">
    <div class="input-group mb-0">
        <span class="input-group-text" id="_image">Foto</span>
        <input type="file" wire:model="image" name="image" class="form-control" id="image">
    </div>
    @error('image')
        <span class="is-invalid">{{$message}}</span>
    @enderror
</div>
<div class="col-12 mb-3">
    <div class="mb-0">
        <label for="_descricao" class="form-label">Descrição</label>
        <textarea class="form-control" name="descricao" wire:model="descricao" id="_descricao" rows="3"></textarea>
    </div>
    @error('descricao')
        <span class="is-invalid">{{$message}}</span>
    @enderror
</div>


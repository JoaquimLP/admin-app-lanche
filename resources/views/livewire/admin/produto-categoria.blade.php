<div wire:ignore.self class="row">
    @error('categoria')
        <div class="alert alert-primary text-white" role="alert">
            {{$message}}
        </div>
    @enderror
    @foreach ($categorias as $key => $item)
        <div class="col-12 col-md-3">
            <div class="mb-0">
                <input type="checkbox" value="{{ $item->id }}" wire:model="categoria" name="categoria[]" class="btn-check" id="_categoria-{{$item->id}}" autocomplete="off">
                <label class="btn btn-outline-primary" for="_categoria-{{$item->id}}">{{$item->nome}}</label><br>
            </div>
        </div>
    @endforeach
    <div class="col-12">
        {{ $categorias->links() }}
    </div>
    <div class="col-3 mt-1">
        <button type="button" wire:click="sync({{$produto->id}})" class="btn btn-info">Salvar</button>
    </div>
</div>

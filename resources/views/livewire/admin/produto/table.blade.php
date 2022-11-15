<div class="table-responsive">
    <table class="table align-items-center mb-0">
        <thead>
            <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Produto</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Preco</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
                <tr>
                    <td>{{$produto->id}}</td>
                    <td>
                        <div class="d-flex px-2 py-1">
                            <div>
                                <img src="{{asset( 'storage/'. $produto->image)}}" class="avatar avatar-sm me-3">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-xs">{{$produto->nome}}</h6>
                            </div>
                        </div>
                    </td>
                    <td>
                        R$ {{number_format($produto->preco, 2, ',', ' ')}}
                    </td>
                    <td class="align-middle text-center text-sm">
                        <a href="#" wire:click.prevent="show({{$produto->id}})" data-bs-toggle="modal" data-bs-target="#modal-show" class="btn btn-sm btn-info">Show</a>
                        <a href="#" wire:click.prevent="edit({{$produto->id}})" data-bs-toggle="modal" data-bs-target="#modal-edit" class="btn btn-sm btn-secondary">Editar</a>
                        <a href="#" wire:click.prevent="delete({{$produto->id}})" class="btn btn-sm btn-danger">Excluir</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="table-responsive">
    <table class="table align-items-center mb-0">
        <thead>
        <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nome</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($ingredientes as $ingrediente)
            <tr>
                <td>{{$ingrediente->id}}</td>
                <td>{{$ingrediente->nome}}</td>
                <td class="align-middle text-center text-sm">
                    {{-- <a href="#" class="btn btn-sm btn-info">Show</a> --}}
                    <a href="#" wire:click.prevent="edit({{$ingrediente->id}})" class="btn btn-sm btn-secondary">Editar</a>
                    <a href="#" wire:click.prevent="delete({{$ingrediente->id}})" class="btn btn-sm btn-danger">Excluir</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

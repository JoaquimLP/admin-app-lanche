<?php

namespace App\Http\Livewire\Admin;

use App\Models\Cardapio\Categoria;
use App\Models\Cardapio\Produto;
use Livewire\Component;
use Livewire\WithPagination;

class ProdutoCategoria extends Component
{
    use WithPagination;

    public $produto = null;

    public $categoria = [];
    public $mensage = null;

    public function mount(){
        $this->categoria = json_decode($this->produto->categorias->pluck('id'));
    }

    public function render()
    {
        $categorias = Categoria::simplePaginate(20);

        return view('livewire.admin.produto-categoria', compact('categorias'));
    }

    public function sync($id)
    {
        $this->validate([
            'categoria' => 'required',
        ]);

        $produto = Produto::find($id);
        if (!$produto) {
            abort(404);
        }

        $produto->categorias()->sync($this->categoria);

        return redirect()->route('produto.index');
    }
}

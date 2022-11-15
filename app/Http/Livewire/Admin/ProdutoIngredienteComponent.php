<?php

namespace App\Http\Livewire\Admin;

use App\Models\Cardapio\Ingrediente;
use App\Models\Cardapio\Produto;
use Livewire\Component;
use Livewire\WithPagination;

class ProdutoIngredienteComponent extends Component
{
    use WithPagination;

    public $produto = null;

    public $ingrediente = [];
    public $mensage = null;
    
    public function mount(){
        $this->ingrediente = json_decode($this->produto->ingredientes->pluck('id'));
    }

    public function render()
    {
        $ingredientes = Ingrediente::simplePaginate(20);
        return view('livewire.admin.produto-ingrediente-component', compact('ingredientes'));
    }

    public function sync($id)
    {
        $this->validate([
            'ingrediente' => 'required',
        ]);

        $produto = Produto::find($id);
        if (!$produto) {
            abort(404);
        }

        $produto->ingredientes()->sync($this->ingrediente);

        return redirect()->route('produto.index');
    }

}

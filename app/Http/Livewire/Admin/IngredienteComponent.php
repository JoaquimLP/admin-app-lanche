<?php

namespace App\Http\Livewire\Admin;

use App\Models\Cardapio\Ingrediente;
use Livewire\Component;
use Livewire\WithPagination;

class IngredienteComponent extends Component
{
    use WithPagination;
    public $acao = 'create';
    public $title = "Adicionar";
    public  $nome;
    public  $descricao;
    public $ingrediente_id = null;

    public function render()
    {
        $ingredientes = Ingrediente::orderBy('id', 'DESC')->simplePaginate(10);
        return view('livewire.admin.ingrediente-component', compact('ingredientes'));
    }

    public function  store()
    {
        $this->validate([
            'nome' => 'required|max:50|min:3',
            'descricao' => 'nullable|max:150|min:3',
        ]);

        Ingrediente::create([
            'nome' => $this->nome,
            'descricao' => $this->descricao
        ]);


        $this->nome = "";
        $this->descricao = "";
    }

    public function edit($id)
    {
        $ingrediente = Ingrediente::find($id);
        if (!$ingrediente) {
            abort(404);
        }

        $this->nome = $ingrediente->nome;
        $this->descricao = $ingrediente->descricao;
        $this->acao = "edit";
        $this->ingrediente_id = $ingrediente->id;
    }

    public function update($id)
    {
        $this->validate([
            'nome' => 'required|max:50|min:3',
            'descricao' => 'nullable|max:150|min:3',
        ]);

        $ingrediente = Ingrediente::find($id);
        if (!$ingrediente) {
            abort(404);
        }

        $ingrediente->update([
            'nome' => $this->nome,
            'descricao' => $this->descricao
        ]);

        $this->nome = "";
        $this->descricao = "";
        $this->acao = "create";
        $this->ingrediente_id = null;
    }

    public function cancelar()
    {
        $this->acao = "create";

        $this->nome = "";
        $this->descricao = "";
    }

    public function delete($id)
    {
        $ingrediente = Ingrediente::find($id);
        if (!$ingrediente) {
            abort(404);
        }

        $ingrediente->delete();
    }
}

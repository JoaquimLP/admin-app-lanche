<?php

namespace App\Http\Livewire\Admin;

use App\Models\Cardapio\Categoria;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriaComponent extends Component
{
    use WithPagination;
    public $acao = 'create';
    public  $nome;
    public  $categoria = null;
    public  $descricao;

    public function render()
    {
        $categorias = Categoria::orderBy('id', 'DESC')->simplePaginate(10);
        return view('livewire.admin.categoria-component', compact('categorias'));
    }

    public function  store()
    {
        $this->validate([
            'nome' => 'required|max:50|min:3',
            'descricao' => 'nullable|max:150|min:3',
        ]);

        Categoria::create([
            'nome' => $this->nome,
            'descricao' => $this->descricao
        ]);

        $this->nome = "";
        $this->descricao = "";
    }

    public function edit($id)
    {
        $categoria = Categoria::find($id);
        if (!$categoria) {
            abort(404);
        }

        $this->nome = $categoria->nome;
        $this->descricao = $categoria->descricao;
        $this->acao = "edit";
        $this->categoria_id = $categoria->id;
    }

    public function update($id)
    {
        $this->validate([
            'nome' => 'required|max:50|min:3',
            'descricao' => 'nullable|max:150|min:3',
        ]);

        $categoria = Categoria::find($id);
        if (!$categoria) {
            abort(404);
        }

        $categoria->update([
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
        $categoria = Categoria::find($id);
        if (!$categoria) {
            abort(404);
        }

        $categoria->delete();
    }

}

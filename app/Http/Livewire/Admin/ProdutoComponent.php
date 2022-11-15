<?php

namespace App\Http\Livewire\Admin;

use App\Models\Cardapio\Produto;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Manny\Manny;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class ProdutoComponent extends Component
{
    use WithFileUploads, WithPagination;

    public  $acao = "create";
    public  $nome;
    public  $preco;
    public  $image;
    public  $descricao;
    public  $produto_id = null;
    public  $produto = null;

    public function render()
    {
        $produtos = Produto::orderBy('id', 'DESC')->simplePaginate(10);

        return view('livewire.admin.produto-component', compact('produtos'));
    }


    public function  store()
    {

        $this->validate([
            'nome' => 'required|max:50|min:3',
            'preco' => 'required',
            'image' => 'required|image',
            'descricao' => 'nullable|max:150|min:3',
        ]);

        $slug = Str::slug($this->nome, '-') . '.' .  $this->image->getClientOriginalExtension();

        $image = $this->image->storeAs('produtos', $slug) ;

        Produto::create([
            'nome' => $this->nome,
            'preco' => str_replace(['.', ','], ['', '.'], $this->preco),
            'image' => $image,
            'descricao' => $this->descricao
        ]);

        $this->emit('onCloseModal');
        $this->resetInput();

    }

    public function resetInput()
    {
        $this->nome = "";
        $this->preco = "";
        $this->image = "";
        $this->descricao = "";
        $this->produto = null;
    }

    public function edit($id)
    {
        $produto = Produto::find($id);
        if (!$produto) {
            abort(404);
        }


        $this->nome = $produto->nome;
        $this->descricao = $produto->descricao;
        $this->preco = $produto->preco;
        $this->acao = "edit";
        $this->produto_id = $produto->id;
        $this->image = "";
    }

    public function update($id)
    {
        $this->validate([
            'nome' => 'required|max:50|min:3',
            'descricao' => 'nullable|max:150|min:3',
        ]);

        $produto = Produto::find($id);
        if (!$produto) {
            abort(404);
        }

        $image = $produto->image;
        if($this->image){
            Storage::disk('public')->delete($produto->image);
            $slug = Str::slug($this->nome, '-') . '.' .  $this->image->getClientOriginalExtension();
            $image = $this->image->storeAs('produtos', $slug) ;
        }

        $produto->update([
            'nome' => $this->nome,
            'preco' => str_replace(['.', ','], ['', '.'], $this->preco),
            'image' => $image,
            'descricao' => $this->descricao
        ]);

        $this->resetInput();
        $this->emit('onCloseModalEdit');
    }

    public function show($id)
    {
        $produto = Produto::find($id);
        if (!$produto) {
            abort(404);
        }

        $this->produto = $produto;
    }

    public function delete($id)
    {
        $produto = Produto::find($id);
        if (!$produto) {
            abort(404);
        }

        $produto->delete();
    }
}

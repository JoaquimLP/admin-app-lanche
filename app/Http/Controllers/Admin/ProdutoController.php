<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cardapio\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        return view("admin.produto.index");
    }

    public function ingrediente(Request $request)
    {
        $produto = Produto::find($request->id);

        if (!$produto) {
            abort(404);
        }


       return view("admin.produto.produto-ingrediente", compact('produto'));
    }

    public function categoria(Request $request)
    {
        $produto = Produto::find($request->id);

        if (!$produto) {
            abort(404);
        }


       return view("admin.produto.produto-categoria", compact('produto'));
    }
}

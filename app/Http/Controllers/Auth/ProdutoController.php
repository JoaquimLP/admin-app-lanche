<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\CategoriaResource;
use App\Http\Resources\Admin\ProdutoResource;
use App\Models\Cardapio\Categoria;
use App\Models\Cardapio\Produto;
use App\Models\User;
use Validator;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'error' => $validator->errors()
            ], 402);
        }

        $user = User::where('token', $request->token)->first();

        if (!$user) {
            return response()->json([
                'status' => false,
                'error' => "Usuário não encontrado"
            ], 402);
        }

        $prdutoIds = Produto::filterProduto($request->categoria);
        if(isset($prdutoIds)){
            $dados["produtos"] = Produto::select(
                'id as codigo',
                'nome as produto',
                'descricao',
                'preco',
                'image',
            )->whereIn('id', $prdutoIds)->paginate(12);
        }else{
            $dados["produtos"] = Produto::select(
                'id as codigo',
                'nome as produto',
                'descricao',
                'preco',
                'image',
            )->paginate(12);
        }

        $categoriaProduto = Categoria::categoriaProduto();
        $dados["categorias"] = CategoriaResource::collection(Categoria::whereIn('id', $categoriaProduto)->get());


        return response()->json([
                'status' => true,
                'data' => $dados,
            ], 200);
    }
}

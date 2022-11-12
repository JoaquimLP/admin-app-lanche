<?php

namespace App\Models\Cardapio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'preco', 'image', 'descricao'];

    public function ingredientes()
    {
        return $this->belongsToMany(Ingrediente::class, 'ingrediente_produto', 'produto_id', 'ingrediente_id');
    }

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'categoria_produto', 'produto_id', 'categoria_id');
    }

    public static function filterProduto($categoria = null)
    {
        if ($categoria) {
            return DB::table('categoria_produto')->where('categoria_id', $categoria)->pluck('produto_id');
        }

        return null;
    }
}

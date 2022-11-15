<?php

namespace App\Models\Cardapio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Categoria extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'descricao'];

    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'categoria_produto', 'categoria_id', 'produto_id');
    }

    public static function categoriaProduto()
    {
        return DB::table('categoria_produto')->groupBy('categoria_id')->pluck('categoria_id');
        //return $this->BelongsTo();
    }
}

<?php

namespace App\Models\Cardapio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'descricao'];
}

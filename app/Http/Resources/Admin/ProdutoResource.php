<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class ProdutoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => [
                'codigo' => $this->id,
                'produto' => $this->nome,
                'preco' => (float) $this->preco,
                'descricao' => $this->descricao,
                'image' => $this->image ? url("storage/$this->image") : '',
                'categoria' => CategoriaResource::collection($this->categorias),
            ],

        ];
    }
}

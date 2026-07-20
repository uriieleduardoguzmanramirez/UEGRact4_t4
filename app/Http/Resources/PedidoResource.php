<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PedidoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'cliente' => $this->cliente,
            'producto' => $this->producto,
            'cantidad' => $this->cantidad,
            'total' => (float) $this->total,
            'estado' => $this->estado,
            'creado_en' => $this->created_at?->format('Y-m-d H:i:s'),
            'actualizado_en' => $this->updated_at?->format('Y-m-d H:i:s'),
        ];
    }
}
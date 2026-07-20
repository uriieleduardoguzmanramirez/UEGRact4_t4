<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePedidoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'cliente' => ['sometimes', 'required', 'string', 'max:100'],
            'producto' => ['sometimes', 'required', 'string', 'max:150'],
            'cantidad' => ['sometimes', 'required', 'integer', 'min:1'],
            'total' => ['sometimes', 'required', 'numeric', 'min:0'],
            'estado' => [
                'sometimes',
                'required',
                'in:pendiente,preparando,entregado,cancelado',
            ],
        ];
    }
}
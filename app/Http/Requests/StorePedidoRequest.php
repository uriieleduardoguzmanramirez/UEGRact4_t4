<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePedidoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'cliente' => ['required', 'string', 'max:100'],
            'producto' => ['required', 'string', 'max:150'],
            'cantidad' => ['required', 'integer', 'min:1'],
            'total' => ['required', 'numeric', 'min:0'],
            'estado' => [
                'required',
                'in:pendiente,preparando,entregado,cancelado',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'cliente.required' => 'El nombre del cliente es obligatorio.',
            'producto.required' => 'El producto es obligatorio.',
            'cantidad.required' => 'La cantidad es obligatoria.',
            'cantidad.min' => 'La cantidad debe ser mayor a cero.',
            'total.required' => 'El total es obligatorio.',
            'estado.in' => 'El estado no es válido.',
        ];
    }
}
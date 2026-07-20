<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente',
        'producto',
        'cantidad',
        'total',
        'estado',
    ];

    protected function casts(): array
    {
        return [
            'cantidad' => 'integer',
            'total' => 'decimal:2',
        ];
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;

class Pedido extends Model
{
    use HasFactory;
    protected $table = 'pedidos';
    protected $fillable = [
        'nome_cliente',
        'email_cliente',
        'tipo_pedido',
        'mesa',
        'itens_pedido',
        'status',
        'endereco',
        'telefone',
    ];

}


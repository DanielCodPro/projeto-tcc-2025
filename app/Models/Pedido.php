<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['nome_cliente', 'email_cliente', 'mesa', 'itens_pedido', 'status'];
}


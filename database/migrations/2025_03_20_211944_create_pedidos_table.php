<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('pedidos', function (Blueprint $table) {
        $table->id();
        $table->string('nome_cliente');
        $table->string('email_cliente');
        $table->json('itens_pedido');
        $table->enum('tipo_pedido', ['local', 'delivery']);
        $table->string('mesa')->nullable();
        $table->string('endereco')->nullable();
        $table->string('telefone')->nullable();
        $table->string('status')->default('pendente');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};

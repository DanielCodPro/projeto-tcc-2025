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
        $table->string('email_cliente')->nullable();
        $table->string('mesa');
        $table->json('itens_pedido'); // Armazena os itens em formato JSON
        $table->enum('status', ['pendente', 'em preparo', 'pronto', 'entregue'])->default('pendente');
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

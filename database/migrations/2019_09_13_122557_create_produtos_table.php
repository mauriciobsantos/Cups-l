<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->decimal('preco',5,2);
            $table->integer('quantidade');
            $table->unsignedBigInteger('id_categoria');
            $table->timestamps(); // Cria as colunas created e Upload

            //Estabelece a chave estrageira 
            $table->foreign('id_categoria')->references('id')->on('categorias');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}

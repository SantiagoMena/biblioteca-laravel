<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            // Table Options
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            
            $table->enum('estado', ['Prestado', 'Regresado'])
                ->default('Prestado')
                ->nullable(false);
            
            $table->unsignedBigInteger('libro_id')
                ->nullable(false)
                ->index();

            $table->unsignedBigInteger('usuario_id')
                ->nullable(false)
                ->index();

            // Foreign Keys
            $table->foreign('libro_id')
                ->references('id')
                ->on('libros');

            $table->foreign('usuario_id')
                ->references('id')
                ->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}

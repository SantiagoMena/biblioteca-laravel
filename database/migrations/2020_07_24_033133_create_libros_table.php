<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            // Table Options
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            
            //  Table Columns
            $table->unsignedBigInteger('biblioteca_id')
                ->nullable(false)
                ->index();

            $table->string('nombre')
                ->comment('Nombre del libro')
                ->charset('utf8')
                ->collation('utf8_unicode_ci')
                ->nullable(false)
                ->unique();

            // Foreign Keys
            $table->foreign('biblioteca_id')
                ->references('id')
                ->on('bibliotecas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libros');
    }
}

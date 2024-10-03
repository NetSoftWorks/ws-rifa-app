<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rifas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('valor');
            $table->double('primera_suerte');
            $table->double('segunda_suerte');
            $table->double('tercera_suerte');
            $table->double('cuarta_suerte');
            $table->double('quinta_suerte');
            $table->double('sexta_suerte');
            $table->double('septima_suerte');
            $table->integer('cifras');
            $table->double('limite');
            $table->string('estado', 10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rifas');
    }
};

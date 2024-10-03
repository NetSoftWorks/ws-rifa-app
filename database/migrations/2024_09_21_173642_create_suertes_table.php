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
        Schema::create('suertes', function (Blueprint $table) {
            $table->bigIncrements('id');            
            $table->string('primera_suerte', 10);
            $table->string('segunda_suerte', 10);
            $table->string('tercera_suerte', 10);
            $table->string('cuarta_suerte', 10);
            $table->string('quinta_suerte', 10);
            $table->string('sexta_suerte', 10);
            $table->string('septima_suerte', 10);
            $table->date('fecha');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suertes');
    }
};

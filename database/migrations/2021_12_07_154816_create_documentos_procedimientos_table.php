<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosProcedimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->down();

        Schema::create('documentos_procedimientos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_doc');
            $table->string('directorio');
            $table->unsignedBigInteger('area_id')->nullable();
            $table->timestamps();

            $table->foreign('area_id')->references('id')->on('menus')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentos_procedimientos');
    }
}

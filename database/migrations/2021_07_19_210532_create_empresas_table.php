<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		$this->down();
		
        Schema::create('empresas', function (Blueprint $table) {
	$table->increments('id');
	$table->string('razon_social')->nullable();
	$table->string('pais')->nullable();
	$table->string('figura_legal')->nullable();
	$table->timestamp('constitucion')->nullable();
	$table->string('acta')->nullable();
	$table->string('acta_fisico')->nullable();
	$table->string('acta_electronico')->nullable();
	$table->string('rfc')->nullable();
	$table->string('rfc_fisico')->nullable();
	$table->string('rfc_electronico')->nullable();
	$table->string('imss')->nullable();
	$table->timestamp('imss_obtencioin')->nullable();
	$table->timestamp('imss_vencimiento')->nullable();
	$table->string('expediente_fisico')->nullable();
	$table->string('expediente_electronico')->nullable();
	$table->string('fiel')->nullable();
	$table->timestamp('fiel_obtencion')->nullable();
	$table->timestamp('fiel_vencimiento')->nullable();
	$table->string('ciec')->nullable();
	$table->string('fiel_electronico')->nullable();
	$table->timestamp('ciec_obtencion')->nullable();
	$table->timestamp('ciec_vencimiento')->nullable();
	$table->string('ciec_electronico')->nullable();
	$table->string('representante_sanitario')->nullable();
	$table->string('justificacion_sanitario')->nullable();
	$table->boolean('is_active')->default(1);
	$table->integer('branch_id')->default(1);
	$table->timestamps();

  });
    }

    /**
     * Reverse the migrations. Yes
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
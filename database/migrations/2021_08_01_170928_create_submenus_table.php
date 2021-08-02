<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		$this->down();
		
        Schema::create('submenus', function (Blueprint $table) {
	$table->increments('id');
	$table->string('name')->nullable();
	$table->string('description')->nullable();
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
        Schema::dropIfExists('submenus');
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFechasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fechas', function(Blueprint $table)
		{
			$table->integer('id_fecha')->primary();
			$table->date('fecha');
			$table->time('hora');
			$table->integer('id_cupo')->index('id_cupo');
			$table->integer('cantidad_especifica_cupos')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fechas');
	}

}

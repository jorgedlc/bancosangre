<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonantesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('donantes', function(Blueprint $table)
		{
			$table->integer('id_donante')->primary();
			$table->string('dui', 10);
			$table->integer('id_paciente')->index('id_paciente');
			$table->string('telefono1', 9)->nullable();
			$table->string('telefono2', 9)->nullable();
			$table->string('nombre', 250)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('donantes');
	}

}

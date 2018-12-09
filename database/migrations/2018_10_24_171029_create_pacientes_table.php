<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePacientesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pacientes', function(Blueprint $table)
		{
			$table->integer('id_paciente')->primary();
			$table->string('nombres', 125);
			$table->string('apellidos', 100)->nullable();
			$table->string('dui', 10);
			$table->string('afiliacion', 12);
			$table->string('procedencia', 100);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pacientes');
	}

}

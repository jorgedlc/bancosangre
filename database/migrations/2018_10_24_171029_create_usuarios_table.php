<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuarios', function(Blueprint $table)
		{
			$table->string('id_usuario', 100)->primary();
			$table->integer('id_tipo_usuario')->index('id_tipo_usuario');
			$table->string('usuario', 25)->nullable();
			$table->string('clave', 150)->nullable();
			$table->string('nombres', 150)->nullable();
			$table->string('apellidos', 150)->nullable();
			$table->integer('estado')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('usuarios');
	}

}

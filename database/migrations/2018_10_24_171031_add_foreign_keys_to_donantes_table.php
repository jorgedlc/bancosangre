<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDonantesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('donantes', function(Blueprint $table)
		{
			$table->foreign('id_paciente', 'donantes_ibfk_1')->references('id_paciente')->on('pacientes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('donantes', function(Blueprint $table)
		{
			$table->dropForeign('donantes_ibfk_1');
		});
	}

}

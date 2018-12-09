<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFechasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('fechas', function(Blueprint $table)
		{
			$table->foreign('id_cupo', 'fechas_ibfk_1')->references('id_cupo')->on('cupos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('fechas', function(Blueprint $table)
		{
			$table->dropForeign('fechas_ibfk_1');
		});
	}

}

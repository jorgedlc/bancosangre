<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCitasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('citas', function(Blueprint $table)
		{
			$table->foreign('id_donante', 'citas_ibfk_1')->references('id_donante')->on('donantes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_fecha', 'citas_ibfk_2')->references('id_fecha')->on('fechas')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_usuario', 'citas_ibfk_3')->references('id_usuario')->on('usuarios')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('citas', function(Blueprint $table)
		{
			$table->dropForeign('citas_ibfk_1');
			$table->dropForeign('citas_ibfk_2');
			$table->dropForeign('citas_ibfk_3');
		});
	}

}

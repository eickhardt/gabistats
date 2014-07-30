<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('data', function(Blueprint $table)
		{
			$table->string('id');
			$table->boolean('img_night');
			$table->boolean('img_with_ship');
			$table->boolean('img_matched_online');
			$table->boolean('img_matched_previous');
			$table->boolean('weather_bad');
			$table->integer('ship_percentage_on_img');
			$table->decimal('ship_length', 6, 1);
			$table->string('timestamp');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('data');
	}

}

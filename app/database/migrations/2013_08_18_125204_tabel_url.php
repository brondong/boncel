<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelUrl extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('url', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('ip', 50);
			$table->string('url', 200);
			$table->string('short', 40);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('url');
	}

}

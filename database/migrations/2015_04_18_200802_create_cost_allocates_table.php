<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostAllocatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cost_allocates', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();

            $table->string('mandante')->index();

            $table->integer('id_superior')->unsigned()->nullable();

            $table->string('numero');
            $table->string('nome');
            $table->string('descricao');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cost_allocates');
	}

}

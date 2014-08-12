<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHabitationRestrictionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('habitation_restrictions', function($table){
                /* @var $table Blueprint */ 
                $table->increments('id');
                $table->integer('habitation_id', false, true);
                $table->integer('restriction_id', false, true);
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::drop('habitation_restrictions');
	}

}

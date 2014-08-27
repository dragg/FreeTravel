<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHabitationAmenitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('habitation_amenities', function($table){
                /* @var $table Blueprint */ 
                $table->increments('id');
                $table->integer('habitation_id', false, true);
                $table->integer('amenity_id', false, true);
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
            Schema::drop('habitation_amenities');
	}

}

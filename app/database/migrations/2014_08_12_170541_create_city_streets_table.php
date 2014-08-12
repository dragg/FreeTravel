<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCityStreetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('city_streets', function($table){
                /* @var $table Blueprint */ 
                $table->increments('id');
                $table->integer('city_id', false, true);
                $table->integer('street_id', false, true);
                $table->timestamps();
            });//
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::drop('city_streets');
	}

}

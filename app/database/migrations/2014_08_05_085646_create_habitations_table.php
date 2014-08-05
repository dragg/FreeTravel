<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHabitationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('habitations', function($table)
        {
            /* @var $table Blueprint */                                   
            $table->increments('id');
            $table->integer('user_id', false, true);
            $table->string('title');                                    
            $table->string('address');
            $table->integer('city_id', false, true);
            $table->tinyInteger('places', false, true)->default(1);
            $table->tinyInteger('deleted', false, true)->default(0);
                                    
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
		Schema::drop('habitations');
	}

}

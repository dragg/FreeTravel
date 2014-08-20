<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('requests', function($table){
                /* @var $table Blueprint */ 
                $table->increments('id');
                $table->integer('habitation_id');
                $table->integer('user_id');
                $table->integer('count');
                $table->date('from');
                $table->date('to');
                $table->integer('accept')->default(0);
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
            Schema::drop('requests');
	}

}

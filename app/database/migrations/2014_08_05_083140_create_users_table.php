<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
    {
        Schema::create('users', function($table)
        {
            /* @var $table Blueprint */                                   
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('telephone')->default('');
            $table->string('password');
            $table->timestamps();
            $table->rememberToken();
        });
    }

    /**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}

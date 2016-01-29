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
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name',50)->nullable();
                        $table->string('lastname',50)->nullable();
			$table->string('email')->unique();
			$table->string('password', 60);
                        $table->string('tokendevice', 50);
                        $table->string('picture', 50);
                        $table->boolean('flagactive')->default(1);
                        $table->timestamp('lastupdate');
                        $table->timestamp('datecreate');
                        $table->timestamp('datedelete')->nullable();
//			$table->rememberToken();
//			$table->timestamps();
//                        $table->softDeletes();
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

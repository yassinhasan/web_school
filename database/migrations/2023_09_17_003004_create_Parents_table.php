<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentsTable extends Migration {

	public function up()
	{
		Schema::create('parents', function(Blueprint $table) {
			$table->id('id');
			$table->timestamps();
			$table->bigInteger('user_id')->unsigned();
			$table->bigInteger('student_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('parents');
	}
}
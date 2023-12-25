<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;


class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('parents', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('parents', function(Blueprint $table) {
			$table->foreign('student_id')->references('id')->on('students')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('parents', function(Blueprint $table) {
			$table->dropForeign('parents_user_id_foreign');
		});
		Schema::table('parents', function(Blueprint $table) {
			$table->dropForeign('parents_student_id_foreign');
		});
	}
}
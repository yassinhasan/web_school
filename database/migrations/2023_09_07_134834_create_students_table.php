<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('image')->default('profile.png');
            $table->string('email')->default("null");
            $table->string('phone')->nullable();
            $table->integer('age')->nullable();
            $table->timestamp('birthday')->nullable();
            $table->string('account_status')->default("enabled");
            $table->string('about')->nullable();
            $table->json("website")->nullable();
            $table->string("country");
            $table->integer("user_id")->nullable();
            $table->enum("gender",["male","female"]);
            $table->integer("points")->default(0);
            $table->json('likedby')->default(new Expression('(JSON_ARRAY())'));
            // $table->timestamps('birthday')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};

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
            $table->string('name')->default(null);
            $table->string('image')->default('profile.png');
            $table->string('email')->unique()->default("null");
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('clear_password');
            $table->string('phone')->nullable();
            $table->integer('age')->nullable();
            $table->string('account_status')->default("enabled");
            $table->string('code')->nullable();
            $table->dateTime('expire_at')->nullable();
            $table->timestamp('birthday')->nullable();
            $table->string('about')->nullable();
            $table->json("website")->nullable();
            $table->string("country")->nullable();
            $table->enum("gender",["male","female"]);
            $table->integer("points")->default(0);
            $table->json('likedby')->default(new Expression('(JSON_ARRAY())'));
            // google
            $table->string('google_id')->nullable();
            $table->string('google_token')->nullable();
            $table->string('google_refresh_token')->nullable();

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

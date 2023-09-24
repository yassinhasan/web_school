<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'first_name' => $this->faker->name(),
            'last_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'country' => $this->faker->name(),
            'gender' => $this->faker->randomElement(['female', 'male']),
            /* 
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
            $table->json("likedby")->default(json_encode([]));
            */
        ];
    }
}

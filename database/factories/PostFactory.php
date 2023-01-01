<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\posts>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence, //Generates a fake 
            'exerpt' =>$this->faker->paragraph(10), 
            'body' => $this->faker->paragraph(30), //generates fake 30 paragraphs
            'user_id' => User::factory()
        ];
    }
}

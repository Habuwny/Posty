<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    $tags = collect([
      "#JavaScript",
      "#NodeJs",
      "#Php",
      "#Php",
      "#VueJs",
      "#Html",
    ]);
    return [
      "title" => $this->faker->sentence(),
      "tags" => $tags->random(),
      "slug" => $tags->random(),
      "excerpt" => $this->faker->paragraph(),
      "body" => $this->faker->paragraphs(12, true),
      "created_at" => $this->faker->dateTimeBetween("-3 months"),
    ];
  }
}

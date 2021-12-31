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
    return [
      "title" => $this->faker->sentence(),
      "excerpt" =>
        "<p>" . implode("</p><p>", $this->faker->paragraphs(2)) . "</p>",
      "body" =>
        "<p>" . implode("</p><p>", $this->faker->paragraphs(6)) . "</p>",
      "created_at" => $this->faker->dateTimeBetween("-3 months"),
    ];
  }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'parent_id' => $this->faker->numberBetween(1,5),
            'name' => $this->faker->sentence(),
            'description' => $this->faker->text(800),
            'image' => $this->faker->imageUrl(1280, 720),
            'link_rewrite' => $this->faker->slug,
            'active' => $this->faker->numberBetween(0,1)
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\item>
 */
class itemFactory extends Factory
{

    protected $model = \App\Models\item::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   public function definition(): array
    {
        return [
            'item_name' => $this->faker->word(),
            'category_name' => $this->faker->randomElement(['Electronics', 'Clothing', 'Books', 'Furniture']),
            'price' => $this->faker->numberBetween(10, 1000),
            'description' => $this->faker->sentence(),
            'img' => $this->faker->imageUrl(640, 480, 'products'),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\order;
use App\Models\customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\order>
 */
class orderFactory extends Factory
{

    protected $model = order::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_date'    => $this->faker->date(),
            'delivery_date' => $this->faker->optional()->date(),
            'amount'        => $this->faker->randomFloat(2, 500, 10000),

            // Foreign key
            'customer_ID'   => Customer::factory(),
        ];
    }
}

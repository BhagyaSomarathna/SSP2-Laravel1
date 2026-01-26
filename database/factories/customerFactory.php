<?php

namespace Database\Factories;

use App\Models\customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\customer>
 */
class customerFactory extends Factory
{

    protected $model = customer::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_name'   => $this->faker->name(),
            'address'         => $this->faker->address(),
            'password'        => Hash::make('password123'),
            'email_address'   => $this->faker->unique()->safeEmail(),
            'contact_number'  => $this->faker->phoneNumber(),
            
        ];
    }
}

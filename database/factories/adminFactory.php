<?php

namespace Database\Factories;

use App\Models\admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admin>
 */
class adminFactory extends Factory
{
    protected $model = admin::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'admin_name'     => $this->faker->name(),
            'admin_password' => Hash::make('admin123'),
            'admin_email'    => $this->faker->unique()->safeEmail(),
        ];
    }
}

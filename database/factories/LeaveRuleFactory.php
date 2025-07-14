<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LeaveRule>
 */
class LeaveRuleFactory extends Factory
{
    protected $model = \App\Models\LeaveRule::class;

    public function definition(): array
    {
        return [
            'role_name' => $this->faker->unique()->jobTitle,
            'annual_leave' => $this->faker->numberBetween(10, 30),
            'sick_leave' => $this->faker->numberBetween(5, 15),
        ];
    }
}


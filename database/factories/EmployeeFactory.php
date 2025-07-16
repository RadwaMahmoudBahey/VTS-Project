<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\LeaveRule; 
use App\Models\Employee; 

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'role_name' => LeaveRule::inRandomOrder()->first()->role_name ?? 'Developer',
            'manager_id' => null,
        ];
    }
}


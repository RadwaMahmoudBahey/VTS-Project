<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\VacationRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

class VacationRequestFactory extends Factory
{
    protected $model = VacationRequest::class;

    public function definition(): array
    {
        $startDate = $this->faker->dateTimeBetween('+1 days', '+1 month');
        $endDate = (clone $startDate)->modify('+'.rand(1,5).' days');

        return [
            'title' => $this->faker->sentence(3),
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
            'request_date' => now(),
            'start_date' => $startDate,
            'end_date' => $endDate,
            'vacation_duration' => $startDate->diff($endDate)->days + 1,
            'description' => $this->faker->optional()->paragraph,
            'leave_type' => $this->faker->randomElement(['annual', 'sick']),
            'employee_id' => Employee::inRandomOrder()->first()->employee_id ?? Employee::factory(),
        ];
    }
}

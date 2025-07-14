<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\LeaveRule::factory(5)->create();

        \App\Models\Employee::factory(20)->create()->each(function ($employee) {
            // Randomly assign manager
            $manager = \App\Models\Employee::where('employee_id', '<>', $employee->employee_id)->inRandomOrder()->first();
            if ($manager) {
                $employee->manager_id = $manager->employee_id;
                $employee->save();
            }
        });

        \App\Models\VacationRequest::factory(50)->create();
    }


}

<?php

namespace Database\Seeders;

use App\Models\OrganizationUnit;
use App\Models\Employee;
use App\Models\JobPosition;
use Illuminate\Support\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HumanResourceDeptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hrdDept = OrganizationUnit::where('short_name', 'HRD')->first();
        $seniorManager = Employee::factory()->create([
            'job_position_id' => JobPosition::where('name', 'Senior Manager')->value('id'),
        ]);

        $hrdDept->employees()->attach($seniorManager->id, [
            'start_date' => Carbon::now()->addYear(-random_int(1, 5))->addDays(-random_int(1, 28)),
            'job_role_id' => 1, // Head of Unit
        ]);

        $employees = Employee::factory()->count(3)->create([
            'job_position_id' => JobPosition::where('name', 'Staff')->value('id'),
        ]);

        collect($employees)->each(function ($employee) use ($hrdDept) {
            $hrdDept->employees()->attach($employee->id, [
                'start_date' => Carbon::now()->addYear(-random_int(1, 5))->addDays(-random_int(1, 28)),
                'job_role_id' => 3, // Staff
            ]);
        });
    }
}

<?php

namespace Database\Seeders;

use App\Models\OrganizationUnit;
use App\Models\Employee;
use App\Models\JobPosition;
use Illuminate\Support\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PresidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Randomly create President
        $president = Employee::factory()->create([
            'job_position_id' => JobPosition::where('name', 'President')->value('id'),
        ]);

        $company = OrganizationUnit::root()->first();
        $company->employees()->attach($president->id, [
            'start_date' => Carbon::now()->addYear(-5)->addDays(-random_int(1, 28)),
            'job_role_id' => 1, // Head of Unit
        ]);

        // Randomly create Managing Secretary and attach to Office of President
        $secretary = Employee::factory()->create([
            'job_position_id' => JobPosition::where('name', 'Managing Secretary')->value('id'),
        ]);
        $ofp = OrganizationUnit::where('short_name', 'OFP')->first();
        $ofp->employees()->attach($secretary->id, [
            'start_date' => Carbon::now()->addYear(-5)->addDays(-random_int(1, 28)),
            'job_role_id' => 2, // Deputy Head of Unit
        ]);
    }
}

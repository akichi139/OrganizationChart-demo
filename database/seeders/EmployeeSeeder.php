<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\JobPosition;
use App\Models\OrganizationUnit;
use Illuminate\Support\Carbon;
use Illuminate\Contracts\Queue\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Nette\Utils\Random;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            PresidentSeeder::class,
            AccountingDeptSeeder::class,
            HumanResourceDeptSeeder::class,
            InformationTechnologyDeptSeeder::class,
        ]);
    }
}

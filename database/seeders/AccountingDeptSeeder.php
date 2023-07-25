<?php

namespace Database\Seeders;

use App\Models\OrganizationUnit;
use App\Models\Employee;
use App\Models\JobPosition;
use Illuminate\Support\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class AccountingDeptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $afdDept = OrganizationUnit::where('short_name', 'AFD')->first();
        $avp = Employee::factory()->create([
            'job_position_id' => JobPosition::where('name', 'Assistant Vice President')->value('id'),
        ]);

        $afdDept->employees()->attach($avp->id, [
            'start_date' => Carbon::now()->addYear(-random_int(1, 5))->addDays(-random_int(1, 28)),
            'job_role_id' => 1, // Head of Unit
        ]);
        $manager = Employee::factory()->create([
            'job_position_id' => JobPosition::where('name', 'Manager')->value('id'),
        ]);

        $afdDept->employees()->attach($manager->id, [
            'start_date' => Carbon::now()->addYear(-random_int(1, 5))->addDays(-random_int(1, 28)),
            'job_role_id' => 2, // Deputy Head of Unit
        ]);

        $employees = Employee::factory()->count(3)->create([
            'job_position_id' => JobPosition::where('name', 'Staff')->value('id'),
        ]);

        collect($employees)->each(function ($employee) use ($afdDept) {
            $afdDept->employees()->attach($employee->id, [
                'start_date' => Carbon::now()->addYear(-random_int(1, 5))->addDays(-random_int(1, 28)),
                'job_role_id' => 3, // Staff
            ]);
        });

        $acsSection = OrganizationUnit::where('short_name', 'ACS')->first();
        $manager = Employee::factory()->create([
            'job_position_id' => JobPosition::where('name', 'Manager')->value('id'),
        ]);
        $acsSection->employees()->attach($manager->id, [
            'start_date' => Carbon::now()->addYear(-random_int(1, 5))->addDays(-random_int(1, 28)),
            'job_role_id' => 1, // Deputy Head of Unit
        ]);

        $employees = Employee::factory()->count(3)->create([
            'job_position_id' => JobPosition::where('name', 'Staff')->value('id'),
        ]);

        collect($employees)->each(function ($employee) use ($acsSection) {
            $acsSection->employees()->attach($employee->id, [
                'start_date' => Carbon::now()->addYear(-random_int(1, 5))->addDays(-random_int(1, 28)),
                'job_role_id' => 3, // Staff
            ]);
        });

        $fnsSection = OrganizationUnit::where('short_name', 'FNS')->first();
        $manager = Employee::factory()->create([
            'job_position_id' => JobPosition::where('name', 'Manager')->value('id'),
        ]);
        $fnsSection->employees()->attach($manager->id, [
            'start_date' => Carbon::now()->addYear(-random_int(1, 5))->addDays(-random_int(1, 28)),
            'job_role_id' => 1, // Deputy Head of Unit
        ]);

        $employees = Employee::factory()->count(3)->create([
            'job_position_id' => JobPosition::where('name', 'Staff')->value('id'),
        ]);

        collect($employees)->each(function ($employee) use ($fnsSection) {
            $fnsSection->employees()->attach($employee->id, [
                'start_date' => Carbon::now()->addYear(-random_int(1, 5))->addDays(-random_int(1, 28)),
                'job_role_id' => 3, // Staff
            ]);
        });
    }
}

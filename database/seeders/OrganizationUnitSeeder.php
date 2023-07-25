<?php

namespace Database\Seeders;

use App\Models\OrganizationUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $company = OrganizationUnit::create([
            'name' => 'My Company Ltd.',
            'short_name' => 'MYC',
            'is_company' => true,
        ]);

        $company->children()->create([
            'name' => 'Office of President',
            'short_name' => 'OFP',
            'is_company' => false,
        ]);

        $company->children()->create([
            'name' => 'Human Resources Department',
            'short_name' => 'HRD',
            'is_company' => false,
        ]);

        $company->children()->create([
            'name' => 'Accounting and Finance Department',
            'short_name' => 'AFD',
            'is_company' => false,
        ]);
        
        $afdDept = OrganizationUnit::where('short_name', 'AFD')->first();
        $afdDept->children()->create([
            'name' => 'Accounting Section',
            'short_name' => 'ACS',
            'is_company' => false,
        ]);

        $afdDept->children()->create([
            'name' => 'Finance Section',
            'short_name' => 'FNS',
            'is_company' => false,
        ]);

        $company->children()->create([
            'name' => 'Information Technology Department',
            'short_name' => 'ITD',
            'is_company' => false,
        ]);

        $itdDept = OrganizationUnit::where('short_name', 'ITD')->first();
        $itdDept->children()->create([
            'name' => 'Software Development Section',
            'short_name' => 'SDS',
            'is_company' => false,
        ]);

        $itdDept->children()->create([
            'name' => 'Network and Infrastructure Section',
            'short_name' => 'NIS',
            'is_company' => false,
        ]);

    }
}

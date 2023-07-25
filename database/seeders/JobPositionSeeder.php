<?php

namespace Database\Seeders;

use App\Models\JobPosition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JobPosition::create([
            'name' => 'President',
            'short_name' => 'President',
            'job_level' => '10'
        ]);

        JobPosition::create([
            'name' => 'Vice President',
            'short_name' => 'VP',
            'job_level' => '11'
        ]);

        JobPosition::create([
            'name' => 'Assistant Vice President',
            'short_name' => 'AVP',
            'job_level' => '12'
        ]);

        JobPosition::create([
            'name' => 'Senior Manager',
            'short_name' => 'SM',
            'job_level' => '13'
        ]);

        JobPosition::create([
            'name' => 'Managing Secretary',
            'short_name' => 'MS',
            'job_level' => '13'
        ]);

        JobPosition::create([
            'name' => 'Manager',
            'short_name' => 'M',
            'job_level' => '14'
        ]);

        JobPosition::create([
            'name' => 'Assistant Manager',
            'short_name' => 'AM',
            'job_level' => '15'
        ]);

        JobPosition::create([
            'name' => 'Senior Engineer',
            'short_name' => 'Senior E.',
            'job_level' => '16'
        ]);

        JobPosition::create([
            'name' => 'Senior Staff',
            'short_name' => 'SS',
            'job_level' => '17'
        ]);

        JobPosition::create([
            'name' => 'Engineer',
            'short_name' => 'Engineer',
            'job_level' => '18'
        ]);

        JobPosition::create([
            'name' => 'Staff',
            'short_name' => 'S',
            'job_level' => '19'
        ]);
        
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class FirstUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => env('INITIAL_USER_FIRST_NAME', 'John'),
            'last_name' => env('INITIAL_USER_LAST_NAME', 'Doe'),
            'email' => env('INITIAL_USER_EMAIL', 'john.doe@gmail.com'),
            'password' => env('INITIAL_USER_PASSWORDHASH', Hash::make('password')),
            'timezone' => env('INITIAL_USER_TIMEZONE', 'Asia/Bangkok')
        ]);
    }
}

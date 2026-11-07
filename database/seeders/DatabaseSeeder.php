<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Department;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
    User::create([
        'name'     => 'Admin',
        'email'    => 'admin123@example.com',
        'password' => Hash::make('Password@123'),
    ]);
    foreach (['HR', 'IT', 'Marketing', 'Accounts'] as $name) {
        Department::create(['name' => $name]);
    }
    }
}

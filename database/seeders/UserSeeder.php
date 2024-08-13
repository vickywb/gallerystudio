<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Create seeder user
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('secret')
        ]);

        $admin->assignRole('admin');

        $member = User::create([
            'name' => 'member',
            'email' => 'member@test.com',
            'password' => Hash::make('secret')
        ]);

        $member->assignRole('member');

        $manager = User::create([
            'name' => 'manager',
            'email' => 'manager@test.com',
            'password' => Hash::make('secret')
        ]);

        $manager->assignRole('manager');
    }
}

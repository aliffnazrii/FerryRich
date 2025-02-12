<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'nurazmin',
            'email' => 'nurazmin@frsb.com',
            'password' => Hash::make('frsbcreators'),
            'role' => 'Admin',
            'is_approved' => true,
        ]);
        User::create([
            'name' => 'mmazim',
            'email' => 'mazim@frsb.com',
            'password' => Hash::make('frsbcreators'),
            'role' => 'Admin',
            'is_approved' => true,
        ]);
        User::create([
            'name' => 'Finance',
            'email' => 'finance@frsb.com',
            'password' => Hash::make('frsbcreators'),
            'role' => 'Finance',
            'is_approved' => true,
        ]);
        User::create([
            'name' => 'ainn',
            'email' => 'ainrahim@frsb.com',
            'password' => Hash::make('frsbcreators'),
            'role' => 'Finance',
            'is_approved' => true,
        ]);


        User::create([
            'name' => 'Admin',
            'email' => 'admin@frsb.com',
            'password' => Hash::make('frsbcreators'),
            'role' => 'Admin',
            'is_approved' => true,
        ]);

        User::create([
            'name' => 'alep',
            'email' => 'a@a',
            'password' => Hash::make('aliffnazrii'),
            'role' => 'Content Creator',
            'is_approved' => true,
        ]);

    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run():void
    {
        User::create([
            'name' => 'alepZ',
            'email' => 'z@z',
            'password' => Hash::make('aliffnazrii'),
            'phone' => '0123456789',
            'role' => 'Content Creator',
            'is_approved' => true,
        ]);

        User::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'password' => Hash::make('password'),
            'phone' => '0198765432',
            'role' => 'Staff',
            'is_approved' => true,
        ]);

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('adminpassword'),
            'role' => 'Admin',
            'is_approved' => true,
        ]);
        
        User::create([
            'name' => 'alepnaz',
            'email' => 'a@a',
            'password' => Hash::make('aliffnazrii'),
            'role' => 'Staff',
            'is_approved' => true,
        ]);
    }
}

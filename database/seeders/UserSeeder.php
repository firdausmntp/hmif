<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin2@if.untirta.ac.id',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole('admin');
        
        // User 2: Regular User 1
        $user1 = User::create([
            'name' => 'Regular User 1',
            'email' => 'user1@if.untirta.ac.id',
            'password' => Hash::make('password'),
        ]);
        $user1->assignRole('user');
        
        // User 3: Regular User 2
        $user2 = User::create([
            'name' => 'Regular User 2',
            'email' => 'user2@if.untirta.ac.id',
            'password' => Hash::make('password'),
        ]);
        $user2->assignRole('user');
    }
}

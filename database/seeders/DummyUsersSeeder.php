<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DummyUsersSeeder extends Seeder
{
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('123456'),
            ],
            [
                'name' => 'Finansas',
                'email' => 'finansas@gmail.com',
                'role' => 'finansas',
                'password' => Hash::make('123456'),
            ],
            [
                'name' => 'Diretor',
                'email' => 'diretor@gmail.com',
                'role' => 'diretor',
                'password' => Hash::make('123456'),
            ],
        ];

        foreach ($userData as $user) {
            User::firstOrCreate(
                ['email' => $user['email']], 
                [
                    'name' => $user['name'],
                    'role' => $user['role'],
                    'password' => $user['password'],
                ]
            );
        }
    }
}



<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // Admin

            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('1234'),
                'role' => 'admin',
                'status' => 'active',
                //'phone' => fake()->phoneNumber,
                //'address' => fake()->address,
                //'photo' => fake()->imageUrl('60','60'),
            ],

            // Employee

            [
                'name' => 'Employee',
                'username' => 'employee',
                'email' => 'employee@gmail.com',
                'password' => Hash::make('1234'),
                'role' => 'admin',
                'status' => 'active',
            ],

            [
                'name' => 'Employee1',
                'username' => 'employee1',
                'email' => 'employee1@gmail.com',
                'password' => Hash::make('1234'),
                'role' => 'admin',
                'status' => 'inactive',
            ]
        ]);
    }
}

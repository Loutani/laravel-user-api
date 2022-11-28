<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Tony Stark',
                'email' => 'tony@stark.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Steve Rogers',
                'email' => 'steve@rogers.com',
                'password' => Hash::make('password456'),
            ]
        ]);
    }
}

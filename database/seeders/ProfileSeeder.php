<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            [
                'firstName' => 'Tony',
                'lastName' => 'Stark',
                'user_id' => 1
            ],
            [
                'firstName' => 'Steve',
                'lastName' => 'Rogers',
                'user_id' => 2
            ]
        ]);
    }
}

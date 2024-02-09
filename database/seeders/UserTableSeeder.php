<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            /* Admin */
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('secret123'),
                'role' => 'admin',

            ],
            /* Company */
            [
                'name' => 'company',
                'email' => 'company@gmail.com',
                'password' => Hash::make('secret123'),
                'role' => 'company',

            ],
            /* User */
            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('secret123'),
                'role' => 'user',

            ],
        ]);
    }
}

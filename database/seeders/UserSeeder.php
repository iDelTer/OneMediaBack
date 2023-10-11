<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'name' => 'admin',
                    'email' => 'admin@admin.com',
                    'password' => Hash::make('admin'),
                    'role' => 'admin'
                ],
                [
                    'name' => 'user',
                    'email' => 'user@user.com',
                    'password' => Hash::make('user'),
                    'role' => 'user'
                ]
            ]
        );
    }
}

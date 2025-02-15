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
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            'email' => 'admin01@gmail.com',
            'password' => Hash::make('admin_12345'),
            'role' => 'admin',
            'address' => 'Null',
            'phone_number' => 'Null',
            'relation' => 'Null',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

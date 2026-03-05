<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('admin123'),
                'role' => 'admin'
            ],
        ]);
        DB::table('users')->insert([
            [
                'name' => 'Chaesarkusuma',
                'username' => 'chaesarkusuma',
                'email' => 'chaesarputra@gmail.com',
                'password' => bcrypt('athifa04'),
                'role' => 'user'
            ],
        ]);
    }
}
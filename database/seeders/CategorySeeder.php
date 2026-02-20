<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB:: table('categories')->insert([
            [
                'name' => 'novel',
                'slug' => 'novel',        
            ],
            [
                'name' => 'comic',
                'slug' => 'comic',        
            ],
            [
                'name' => 'Sejarah Islam',
                'slug' => 'sejarah-islam',
            ]   
        ]);
        
    }
}

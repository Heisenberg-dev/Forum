<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create(['name' => 'General']);
        Category::create(['name' => 'Programming']);
        Category::create(['name' => 'Design']);
        Category::create(['name' => 'Sport']);
        Category::create(['name' => 'Bussiness']);
        Category::create(['name' => 'People']);
        Category::create(['name' => 'Videogames']);
        Category::create(['name' => 'Talkative']);
        Category::create(['name' => 'Relationship']);
    }
}


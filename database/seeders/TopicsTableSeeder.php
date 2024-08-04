<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Topic;

class TopicsTableSeeder extends Seeder
{
    public function run()
    {
        Topic::create(['title' => 'First Topic', 'description' => 'This is the first topic']);
        Topic::create(['title' => 'Second Topic', 'description' => 'This is the second topic']);
    }
}

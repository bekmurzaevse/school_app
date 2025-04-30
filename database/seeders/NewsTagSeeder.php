<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('news_tag')->insert([
            [
                'news_id' => 2,
                'tag_id' => 1
            ],
            [
                'news_id' => 2,
                'tag_id' => 2
            ],
            [
                'news_id' => 1,
                'tag_id' => 6
            ],
            [
                'news_id' => 3,
                'tag_id' => 4
            ],
            [
                'news_id' => 1,
                'tag_id' => 5
            ],
            [
                'news_id' => 4,
                'tag_id' => 5
            ],
            [
                'news_id' => 4,
                'tag_id' => 6
            ],
        ]);
    }
}

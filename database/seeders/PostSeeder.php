<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            [
                'user_id' => 1, // UserSeederで挿入したユーザーを関連付け
                'title' => 'My First Post',
                'content' => 'This is the content of the first post.',
            ]
            ]);
        DB::table('post_tag')->insert([
            ['post_id' => 1, 'tag_id' => 1], // My First Post に Laravel タグを追加
            ['post_id' => 1, 'tag_id' => 2], // My First Post に PHP タグを追加
            ['post_id' => 2, 'tag_id' => 3], // Hanako's Post に Web Development タグを追加
        ]);
    }
}

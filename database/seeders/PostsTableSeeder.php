<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'slug' => 'default-post',
                'category' => 'Uncategorized',
                'title' => 'Default Post',
                'description' => 'This is a default post.',
                'body' => file_get_contents('https://loripsum.net/api/plaintext'),
                'image_path' => 'placeholder.jpg',
                'created_at' => Carbon::now(),
                'user_id' => 1
            ],
        ]);
    }
}

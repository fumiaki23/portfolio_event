<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{
    public function run()
    {
        factory(Post::class, 15)->create();
    }
}

<?php

use Illuminate\Database\Seeder;
use Jsdecena\Blog\Models\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'title'         => 'Hello world',
            'user_id' 		=> 1,
            'slug'         	=> 'hello-world',
            'content'       => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?',
            'status' 		=> 1
        ]);
    }
}
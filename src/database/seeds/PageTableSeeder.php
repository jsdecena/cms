<?php

use Illuminate\Database\Seeder;
use Jsd\Blog\Models\Page;

class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Page::create([
            'title'         => 'About us',
            'slug'         	=> 'about-us',
            'content'       => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?',
            'status' 		=> 1
        ]);
    }
}
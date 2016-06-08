<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name'          => 'John Doe',
            'email'         => 'john@doe.com',
            'password'      => Hash::make('Testing123')
        ]);
    }
}

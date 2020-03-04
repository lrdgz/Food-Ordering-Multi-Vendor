<?php

use Illuminate\Database\Seeder;
use \App\Tag;
use \App\Address;
use \App\Restaurant;
use \App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
//        factory( Tag::class, 500 )->create();
        factory( Address::class, 250 )->create();
        factory( User::class, 150 )->create();
        factory( Restaurant::class, 150 )->create();
    }
}

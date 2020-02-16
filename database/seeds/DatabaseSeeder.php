<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Post;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      
        $this->call(PostsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    
    }
}

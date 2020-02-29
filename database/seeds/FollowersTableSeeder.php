<?php

use Illuminate\Database\Seeder;
use App\Follower;
class FollowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        for ($i = 1; $i < 6; $i++) {
          
            $followers = new Follower;
            $fallowers->user_id = 1;
            $fallowers->follower_user_id = 3;
            $fallowers->save();
        }
    }
}

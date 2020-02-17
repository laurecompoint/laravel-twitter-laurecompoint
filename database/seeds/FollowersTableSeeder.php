<?php

use Illuminate\Database\Seeder;
use App\Fallowers;
class FollowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 1; $i < 6; $i++) {
            $fallower = new Fallowers;
            $fallower->follower_user_id = 3;
            $fallower->user_id = $i;
          
            $post->save();
        }
    }
}

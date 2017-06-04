<?php

use Illuminate\Database\Seeder;
use App\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


      $this->call(UsersTableSeeder::class);
      $this->command->info('User table seeded!');

      $this->call(FollowersTableSeeder::class);
      $this->command->info('Follower table seeded!');
    }
}

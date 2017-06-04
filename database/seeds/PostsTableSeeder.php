<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('posts')->delete();

      // User with ID 1 is following user with ID 2
      Post::create(array(
          'user_id'     => '1',
          'id' => '1',
          'body' => 'testbody1'
      ));

      Post::create(array(
          'user_id'     => '2',
          'id' => '2',
          'body' => 'testbody2'
      ));

      Post::create(array(
          'user_id'     => '3',
          'id' => '3',
          'body' => 'testbody3'
      ));

      Post::create(array(
          'user_id'     => '4',
          'id' => '4',
          'body' => 'testbody4'
      ));


    }
}

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
          'body' => 'user 1 testbody 1'
      ));

      Post::create(array(
          'user_id'     => '2',
          'id' => '2',
          'body' => 'user 2 testbody 1'
      ));

      Post::create(array(
          'user_id'     => '3',
          'id' => '3',
          'body' => 'user 3 testbody 1'
      ));

        Post::create(array(
            'user_id'     => '3',
            'id' => '4',
            'body' => 'user 3 testbody 2'
        ));

        Post::create(array(
            'user_id'     => '3',
            'id' => '5',
            'body' => 'user 3 testbody 3'
        ));

        Post::create(array(
            'user_id'     => '3',
            'id' => '6',
            'body' => 'user 3 testbody 4'
        ));
        Post::create(array(
            'user_id'     => '3',
            'id' => '7',
            'body' => 'user 3 testbody 5'
        ));

      Post::create(array(
          'user_id'     => '4',
          'id' => '8',
          'body' => 'user 4 testbody 1'
      ));

        Post::create(array(
            'user_id'     => '4',
            'id' => '9',
            'body' => 'user 4 testbody 2'
        ));

        Post::create(array(
            'user_id'     => '4',
            'id' => '10',
            'body' => 'user 4 testbody 3'
        ));

        Post::create(array(
            'user_id'     => '4',
            'id' => '11',
            'body' => 'user 4 testbody 4'
        ));

        Post::create(array(
            'user_id'     => '4',
            'id' => '12',
            'body' => 'user 4 testbody 5'
        ));


    }
}

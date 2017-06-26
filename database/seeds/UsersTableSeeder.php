<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->delete();

      $role_user = Role::where('name', 'User')->first();
      $role_admin = Role::where('name', 'Admin')->first();


        User::create(array(
          'name'  => 'username1',
          'email'     => 'foo@bar.com',
          'password'  => Hash::make("passwort"),
          'description' => 'User One'
      ));

      User::create(array(
          'name'  => 'username2',
          'email'     => 'foo2@bar.com',
          'password'  => Hash::make("passwort"),
          'description' => 'User Two'
      ));

      User::create(array(
          'name'  => 'username3',
          'email'     => 'foo3@bar.com',
          'password'  => Hash::make("passwort"),
          'description' => 'User Three'
      ));

      User::create(array(
          'name'  => 'username4',
          'email'     => 'foo4@bar.com',
          'password'  => Hash::make("passwort"),
          'description' => 'User Four'
      ));

        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@example.com';
        $admin->password = Hash::make("passwort");
        $admin->description = 'I am the Admin';
        $admin->save();
        $admin->roles()->attach($role_admin);
    }



}

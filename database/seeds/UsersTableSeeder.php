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
    DB::table('users')->delete();
    // manually make a list of users
    $users = [
      [
        'name'     => 'Administrador',
        'email'    => 'admin@todo.app',
        'password' => bcrypt('admin')
      ],
    ];
    DB::table('users')->insert($users);
    //$users = factory(App\User::class, 20)->create();
  }
}

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
        'email'    => 'admin@expedicao.app',
        'password' => bcrypt('admin')
      ],
      [
        'name'     => 'usuario1',
        'email'    => 'usuario1@expedicao.app',
        'password' => bcrypt('usuario1')
      ],
      [
        'name'     => 'usuario2',
        'email'    => 'usuario2@expedicao.app',
        'password' => bcrypt('usuario2')
      ],
      [
        'name'     => 'Gerente',
        'email'    => 'gerente@expedicao.app',
        'password' => bcrypt('gerente')
      ],
    ];
    DB::table('users')->insert($users);
    //$users = factory(App\User::class, 20)->create();
  }
}

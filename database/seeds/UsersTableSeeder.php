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
        'name'     => 'Visitante',
        'email'    => 'visitante@expedicao.app',
        'password' => bcrypt('visitante')
      ],
      [
        'name'     => 'Usuario',
        'email'    => 'usuario@expedicao.app',
        'password' => bcrypt('usuario')
      ],
      [
        'name'     => 'Gerente',
        'email'    => 'gerente@expedicao.app',
        'password' => bcrypt('gerente')
      ],
      [
        'name'     => 'Administrador',
        'email'    => 'admin@expedicao.app',
        'password' => bcrypt('admin')
      ],
      [
        'name'     => 'Usuario1',
        'email'    => 'usuario1@todo.app',
        'password' => bcrypt('usuario1')
      ],
      [
        'name'     => 'Usuario2',
        'email'    => 'usuario2@todo.app',
        'password' => bcrypt('usuario2')
      ],
    ];
    DB::table('users')->insert($users);
    //$users = factory(App\User::class, 20)->create();
  }
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $this->call(PermissionsTableSeederUsers::class);
    $this->call(PermissionsTableSeederTasks::class);
    $this->call(RolesTableSeeder::class);
    $this->call(UsersTableSeeder::class);
    $this->call(AclSeeder::class);

    $this->call(TasksTableSeeder::class);
  }
}

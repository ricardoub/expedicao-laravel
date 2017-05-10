<?php

use Illuminate\Database\Seeder;

use App\Role;

class RolesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $adminRole = new Role();
    $adminRole->name         = 'admin';
    $adminRole->display_name = 'Administrator';
    $adminRole->description  = 'User is allowed to create and edit all register on system';
    $adminRole->save();

    $taskCommonRole = new Role();
    $taskCommonRole->name         = 'task-common';
    $taskCommonRole->display_name = 'TASKs create/edit'; // optional
    $taskCommonRole->description  = 'User is allowed to (create new, list, show and edit their own) TASKs'; // optional
    $taskCommonRole->save();

    $taskAdvancedRole = new Role();
    $taskAdvancedRole->name         = 'task-advanced';
    $taskAdvancedRole->display_name = 'TASKs delete/change owner'; // optional
    $taskAdvancedRole->description  = 'User is allowed to (delete and change the owner) on their own TASKs.'; // optional
    $taskAdvancedRole->save();
  }
}

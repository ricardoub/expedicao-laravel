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
    $adminRole->description  = 'The user is allowed to access and manage the all records of system';
    $adminRole->save();

    $taskBasicRole = new Role();
    $taskBasicRole->name         = 'task-basic';
    $taskBasicRole->display_name = 'TASKs create/edit'; // optional
    $taskBasicRole->description  = 'User is allowed to (list and show their own) TASKs'; // optional
    $taskBasicRole->save();

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

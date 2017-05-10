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
    $visitorRole = new Role();
    $visitorRole->name         = 'visitor';
    $visitorRole->display_name = 'Visitor';
    $visitorRole->description  = 'User is allowed to list register on system';
    $visitorRole->save();

    $unityCommonRole = new Role();
    $unityCommonRole->name         = 'unity-common';
    $unityCommonRole->display_name = 'Unity common user';
    $unityCommonRole->description  = 'The user is allowed access to the records of his unit';
    $unityCommonRole->save();

    $unityManagerRole = new Role();
    $unityManagerRole->name         = 'unity-manager';
    $unityManagerRole->display_name = 'Unity manager user';
    $unityManagerRole->description  = 'The user is allowed to access and manage the records of his unit';
    $unityManagerRole->save();

    $adminRole = new Role();
    $adminRole->name         = 'admin';
    $adminRole->display_name = 'Administrator';
    $adminRole->description  = 'The user is allowed to access and manage the all records of system';
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

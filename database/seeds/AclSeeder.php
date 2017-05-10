<?php

use Illuminate\Database\Seeder;

use App\Permission;
use App\Role;
use App\User;

class AclSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    /*
     * ROLES
     */
    $adminRole = Role::where('name', '=', 'admin')->first();

    $taskCommonRole   = Role::where('name', '=', 'task-common')->first();
    $taskAdvancedRole = Role::where('name', '=', 'task-advanced')->first();

    /*
     * PERMISSIONS
     */
    // task
    $taskMenu    = Permission::where('name', '=', 'task-menu')->first();
    $taskIndex   = Permission::where('name', '=', 'task-index')->first();
    $taskShow    = Permission::where('name', '=', 'task-show')->first();
    $taskCreate  = Permission::where('name', '=', 'task-create')->first();
    $taskEdit    = Permission::where('name', '=', 'task-edit')->first();
    $taskDelete  = Permission::where('name', '=', 'task-delete')->first();
    $taskOwner   = Permission::where('name', '=', 'task-owner')->first();
    $taskAdmin   = Permission::where('name', '=', 'task-admin')->first();

    /*
     * ACL
     */
    $taskCommonRole->attachPermissions(
      array($taskMenu, $taskIndex, $taskShow, $taskCreate, $taskEdit));
    $taskAdvancedRole->attachPermissions(
      array($taskOwner, $taskDelete));
    $adminRole->attachPermissions(
      array($taskAdmin));

      /*
       * USERS
       */
      $userCommon = User::where('name', '=', 'Usuario1')->first();
      $userCommon->roles()->attach($taskCommonRole->id);

      $userAdvanced = User::where('name', '=', 'Usuario2')->first();
      $userAdvanced->roles()->attach($taskCommonRole->id);
      $userAdvanced->roles()->attach($taskAdvancedRole->id);

      $userAdmin = User::where('name', '=', 'Administrador')->first();
      $userAdmin->roles()->attach($taskCommonRole->id);
      $userAdmin->roles()->attach($taskAdvancedRole->id);
      $userAdmin->roles()->attach($adminRole->id);

  }
}

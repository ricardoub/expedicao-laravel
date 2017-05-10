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
    $adminRole         = Role::where('name', '=', 'admin')->first();
    $visitorRole       = Role::where('name', '=', 'visitor')->first();
    $tasksBasicRole    = Role::where('name', '=', 'task-basic')->first();
    $tasksCommonRole   = Role::where('name', '=', 'task-common')->first();
    $tasksAdvancedRole = Role::where('name', '=', 'task-advanced')->first();

    /*
     * PERMISSIONS
     */
    // tasks
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
    $tasksBasicRole->attachPermissions(
      array($taskMenu, $taskIndex, $taskShow));
    $tasksCommonRole->attachPermissions(
      array($taskCreate, $taskEdit));
    $tasksAdvancedRole->attachPermissions(
      array($taskDelete, $taskOwner));
    $adminRole->attachPermissions(
      array($taskAdmin));

    /*
     * USERS
     */
    $userBasic = User::where('name', '=', 'usuario1')->first();
    $userBasic->roles()->attach($tasksBasicRole->id);

    $userCommon = User::where('name', '=', 'usuario2')->first();
    $userCommon->roles()->attach($tasksBasicRole->id);
    $userCommon->roles()->attach($tasksCommonRole->id);

    $userManager = User::where('name', '=', 'Gerente')->first();
    $userManager->roles()->attach($tasksBasicRole->id);
    $userManager->roles()->attach($tasksCommonRole->id);
    $userManager->roles()->attach($tasksAdvancedRole->id);

    $userAdmin = User::where('name', '=', 'Administrador')->first();
    $userAdmin->roles()->attach($tasksBasicRole->id);
    $userAdmin->roles()->attach($tasksCommonRole->id);
    $userAdmin->roles()->attach($tasksAdvancedRole->id);
    $userAdmin->roles()->attach($adminRole->id);

  }
}

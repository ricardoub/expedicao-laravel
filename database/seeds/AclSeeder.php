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
<<<<<<< HEAD
     */

    $visitorRole      = Role::where('name', '=', 'visitor')->first();
    $unityCommonRole  = Role::where('name', '=', 'unity-common')->first();
    $unityManagerRole = Role::where('name', '=', 'unity-manager')->first();
    $adminRole        = Role::where('name', '=', 'admin')->first();

    /*
     * PERMISSIONS
     */

    // userRole
    $userMenu    = Permission::where('name', '=', 'user-menu')->first();
    $userProfile = Permission::where('name', '=', 'user-profile')->first();
    $userIndex   = Permission::where('name', '=', 'user-index')->first();
    $userShow    = Permission::where('name', '=', 'user-show')->first();
    $userCreate  = Permission::where('name', '=', 'user-create')->first();
    $userEdit    = Permission::where('name', '=', 'user-edit')->first();
    $userDelete  = Permission::where('name', '=', 'user-delete')->first();
    $userAdmin   = Permission::where('name', '=', 'user-admin')->first();

    /*
     * ACL
     */
    $visitorRole->attachPermissions(
      array($userProfile));
    $unityCommonRole->attachPermissions(
      array($userProfile, $userMenu, $userIndex, $userShow));
    $unityManagerRole->attachPermissions(
      array($userCreate, $userEdit, $userDelete));

    $adminRole->attachPermissions(
      array($userAdmin));

    /*
     * USERS
     */

    $visitorUser = User::where('name', '=', 'Visitante')->first();
    $visitorUser->roles()->attach($visitorRole->id);

    $unityCommonUser = User::where('name', '=', 'Usuario')->first();
    $unityCommonUser->roles()->attach($unityCommonRole->id);

    $unityManagerUser = User::where('name', '=', 'Gerente')->first();
    $unityManagerUser->roles()->attach($unityCommonRole->id);
    $unityManagerUser->roles()->attach($unityManagerRole->id);

    $userAdmin = User::where('name', '=', 'Administrador')->first();
    $userAdmin->roles()->attach($unityCommonRole->id);
    $userAdmin->roles()->attach($unityManagerRole->id);
    $userAdmin->roles()->attach($adminRole->id);
=======
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
>>>>>>> TAREFAS

  }
}

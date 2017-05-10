<?php

use Illuminate\Database\Seeder;

use App\Permission;

class PermissionsTableSeederTasks extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $taskMenu = new Permission();
    $taskMenu->name         = 'task-menu';
    $taskMenu->display_name = 'Task menu';
    $taskMenu->description  = 'Allow to view Task menu item';
    $taskMenu->save();

    $taskIndex = new Permission();
    $taskIndex->name         = 'task-index';
    $taskIndex->display_name = 'Task List';
    $taskIndex->description  = 'View the Task List';
    $taskIndex->save();

    $taskShow = new Permission();
    $taskShow->name         = 'task-show';
    $taskShow->display_name = 'Task Show';
    $taskShow->description  = 'View the Task records';
    $taskShow->save();

    $taskCreate = new Permission();
    $taskCreate->name         = 'task-create';
    $taskCreate->display_name = 'Task Create';
    $taskCreate->description  = 'Create new task';
    $taskCreate->save();

    $taskEdit = new Permission();
    $taskEdit->name         = 'task-edit';
    $taskEdit->display_name = 'Task Edit';
    $taskEdit->description  = 'Edit Task records';
    $taskEdit->save();

    $taskDelete = new Permission();
    $taskDelete->name         = 'task-delete';
    $taskDelete->display_name = 'Task Delete';
    $taskDelete->description  = 'Delete Task records';
    $taskDelete->save();

    $taskOwner = new Permission();
    $taskOwner->name         = 'task-owner';
    $taskOwner->display_name = 'Task Owner';
    $taskOwner->description  = 'Change Task owner';
    $taskOwner->save();

    $taskAdmin = new Permission();
    $taskAdmin->name         = 'task-admin';
    $taskAdmin->display_name = 'Task Admin';
    $taskAdmin->description  = 'Manage all records and actions of tasks';
    $taskAdmin->save();
  }
}

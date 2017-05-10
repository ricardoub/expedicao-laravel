<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('tasks')->delete();
    $todos = factory(App\Task::class, 20)->create();
  }
}

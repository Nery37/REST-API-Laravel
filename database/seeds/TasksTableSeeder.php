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
        factory(App\Task::class)->create([
            'name'=>'Estudar PHP 7',
            'complete'=>false
        ]);
        factory(App\Task::class)->create([
            'name'=>'Estudar Javascript',
            'complete'=>false
        ]);
        factory(App\Task::class)->create([
            'name'=>'Estudar Laravel',
            'complete'=>false
        ]);
    }
}

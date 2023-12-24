<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tasks')->insert([
            'user_id' => '1',
            'task_name' => 'RPL',
            'description' => 'TaskTrove',
            'started' => '2023-10-21',
            'deadline' => '2023-10-25',
            'status' => 'TO_DO',
        ]);
    }
}

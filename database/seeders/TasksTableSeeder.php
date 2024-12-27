<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Create 10 tasks
        foreach (range(1, 10) as $index) {
            $status = $faker->randomElement(['Pending', 'In Progress', 'Completed']);
            $user_id = $faker->randomElement([10, 11]);

            Task::create([
                'user_id' => $user_id,
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'status' => $status,
                'due_date' => $faker->date(),
            ]);
        }
    }
}

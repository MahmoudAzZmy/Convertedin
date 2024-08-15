<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            User::factory()->employee()
                ->count(10000)
                ->create(),

            User::factory()->admin()
                ->count(100)->create(),
                
            Task::factory()->count(100)->create(),
        ]);
    }
}

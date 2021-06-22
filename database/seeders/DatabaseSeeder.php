<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
//        $this->call(ExamTypesSeeder::class);
//        $this->call(UserTableSedder::class);
//          $this->call(UserProfileSeeder::class);
          $this->call(CoursesSeeder::class);
    }
}

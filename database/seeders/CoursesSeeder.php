<?php

namespace Database\Seeders;

use App\Models\Courses;
use App\Models\ExamType;
use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course_title=  array(
            [
                'title'=> 'Bangla',
            ],
            [
                'title'=> 'English',
            ],
            [
                'title'=> 'Math',
            ],
            [
                'title'=> 'Chemistry',
            ],
            [
                'title'=> 'Biology',
            ],
            [
                'title'=> 'Physics',
            ],
        );

        foreach ($course_title as $title){

            $course = new Courses();
            $course->fill($title)->save();
        }
    }
}

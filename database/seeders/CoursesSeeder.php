<?php

namespace Database\Seeders;

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
        $courses =  array(
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

        $exam_type = ExamType::all();
        foreach ($exam_type as $type){
            foreach ($courses as $course){
                $type->courses()->create($course);
            }

        }
    }
}

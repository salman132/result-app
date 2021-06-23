<?php

namespace Database\Seeders;

use App\Models\Courses;
use App\Models\Exam;
use App\Models\ExamType;
use Illuminate\Database\Seeder;

class ExamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $exam_type = ExamType::all();
        $courses = Courses::all();
        foreach ($exam_type as $type){
            foreach ($courses as $course){
                $exam = new Exam();
                $exam->exam_type_id = $type->id;
                $exam->course_id = $course->id;
                $exam->save();
            }
        }
    }
}

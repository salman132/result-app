<?php

namespace Database\Seeders;

use App\Models\Courses;
use App\Models\Result;
use App\Models\User;
use Illuminate\Database\Seeder;

class ResultsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        foreach ($users as $user){
            $exams = $user->same_type_exam()->get();
            foreach ($exams as $exam){
                $result = new Result();
                $result->user_id = $user->id;
                $result->exam_id = $exam->id;
                $result->score = rand(33,100) ;
                $result->grade = $this->getGrade($result->score);
                $result->save();
            }
        }
    }

    public function getGrade($score){
        $grade_list = array_reverse(range(33,100));
        $grade_stack = array();
        $grade = 'A';

        foreach ($grade_list as $key=> $list){
            if($key >9 && $key%10 ==0){

                if($grade != 'F'){
                    $grade++;
                }
            }

            $grade_stack[$list] = $grade;
        }

        return isset($grade_stack[$score]) ? $grade_stack[$score] : 'F';

    }
}

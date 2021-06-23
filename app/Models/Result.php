<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;



    public function exam(){
        return $this->belongsTo(Exam::class);
    }

    public function setGradeAttribute(){

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

        $this->attributes['grade'] = isset($grade_stack[$this->score]) ? $grade_stack[$this->score] : 'F';


    }
}

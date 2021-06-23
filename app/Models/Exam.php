<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    public function courses(){
        return $this->belongsTo(Courses::class,'course_id','id');
    }
    public function exam_type(){
        return $this->belongsTo(ExamType::class,'exam_type_id','id');
    }
}

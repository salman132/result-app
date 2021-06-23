<?php

namespace Database\Seeders;

use App\Models\ExamType;
use Illuminate\Database\Seeder;

class ExamTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $exam_types = array(
            [
                'title' => 'SSC',
                'description' => 'This is SSC level'
            ],
            [
                'title' => 'HSC',
                'description' => 'This is HSC level'
            ]
        );
        foreach ($exam_types as $exam) {

            $exam_type = new ExamType();
            $exam_type->fill($exam)->save();
        }
    }
}

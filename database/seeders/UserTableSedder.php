<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            [
                'name'=> 'salman rahman auvi',
                'registration_number' => '1321305',
                'phone_number' => '01303321178',
                'exam_type' => 1,
            ],
            [
                'name'=> 'Mostafizur Rahman',
                'registration_number' => '1321306',
                'phone_number' => '01686235902',
                'exam_type' => 2,
            ],
        );

        foreach ($users as $user){

            $usr = new User();
            $usr->fill($user)->save();
        }
    }
}

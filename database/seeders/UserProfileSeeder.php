<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_profile =  array(
            [
                'email'=> 'salman.auvi@gmail.com',
                'address' => 'Uttara,Dhaka',
                'batch' => '2021',
                'gender' => 'Male',
            ],
            [
                'email'=> 'mostafiz@gmail.com',
                'address' => 'Dhanmondi,Dhaka',
                'batch' => '2021',
                'gender' => 'Male',
            ],
        );

        $users = User::all();
        foreach ($users as $key=> $user){
            $user->user_profile()->create($user_profile[$key]);
        }
    }
}

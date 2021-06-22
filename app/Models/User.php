<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $appends = ['encrypted_phone_number'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user_profile(){
        return $this->hasOne(UserProfile::class);
    }
    public function getEncryptedPhoneNumberAttribute(){

        $phone = str_split($this->phone_number);

        $count = count($phone);

        for($i=$count/2;$i>2;$i--){
            if($phone[$i] != '@'){
                $phone[$i]="*";
            }

        }

        $phone= implode("",$phone);

        return $phone;
    }
}

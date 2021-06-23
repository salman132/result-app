<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiLoginController extends Controller
{

    public function init(){
        if(Auth::check()){
            $user = Auth::user();
            return response()->json(['status'=>'success','user'=>$user,]);
        }
        return response()->json(['status'=>false,'user'=>'Please Login',]);
    }


    public function beforeLogin(Request $request){

        $request->validate([
            'registration_number' => 'required|string',
            'exam_type' => 'required',
            'remember_me' => 'boolean'
        ]);


        $user = User::where(['registration_number'=>$request->registration_number,'exam_type'=>$request->exam_type])->first();
        if(!empty($user)){
            $pin = rand(1000,9999);
            $user->pin_number= $pin;
            $user->save();
            return response()->json(['status'=>'success','user'=>$user,]);
        }
        return response()->json(['status'=>false,'user'=>'Invalid Login']);

    }

    public function login(Request $request){
        $request->validate([
            'registration_number' => 'required|string',
            'exam_type' => 'required',
            'pin_number' => 'required',
            'remember_me' => 'boolean'
        ]);


        $user = User::where(['registration_number'=>$request->registration_number,'exam_type'=>$request->exam_type,'pin_number'=>$request->pin_number])->first();
        if(!empty($user)){
            $user->pin_number= null;
            $user->save();
            ;

            $token = $user->createToken('Laravel Password Grant Client')->accessToken;

            if($request->remember_me){
                $token->expires_at = Carbon::now()->addWeeks(1);
            }

            return response()->json(['status'=>'success','token'=>"Bearer ".$token]);

        }
        return response()->json(['status'=>false,'token'=>'Invalid PIN']);
    }



    public function logout(Request $request){
        dd($request);
        $request->user()->token()->revoke();
        Auth::logout();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public  function sendSms(Request $request){
        $user = User::findOrFail($request->id);
        $pin = rand(1000,9999);
        $user->pin_number= $pin;
        $user->save();
        return response()->json(['status'=>'success','user'=>$user,]);

    }
}

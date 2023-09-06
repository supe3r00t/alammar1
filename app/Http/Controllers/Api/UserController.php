<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpseclib3\Crypt\Hash;

class UserController extends Controller
{
    public function updatePassword (Request $request){

        $user = Auth::user();

        if(!Auth::check($request['current_password'], $user->password)){

//            if (!Hash::check($request->password,$user->password)){


            return response()->json(['message' => 'Your current password is incorrect'] ,401);
        }

        $validateData = $request->validate([

            'password' => 'required',
            'new_password'=>'required|confirmed',
            'new_password_confirmation'=>'required'
        ]);

        $user->password = bcrypt($validateData['new_password']);
        if ($user->save()){

            return ['message' => 'Password updated successfully'];

        }else{


            return response()->json(['message' => 'Some error happened , please try again'],500);
        }

    }




    public function updateProfile(Request $request){


        //منع ارسال ايميل مكرر مسبقا مع استثناء لليوزر بصلاحية ايميله

        $validateData = $request->validate([

            'name'=>'required',
            'email'=>'required|unique:users,email,'.auth()->id()
        ]);

        if (auth()->user()->update($validateData)){

            return ['message' => 'Update successfully'];

        }
        return response()->json(['message' => 'Please try again later'] ,500);

    }
}

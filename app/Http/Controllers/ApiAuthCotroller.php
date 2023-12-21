<?php

namespace App\Http\Controllers;


use App\Models\User;

// use Hash;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;



class ApiAuthCotroller extends Controller
{

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [


            "name" => 'required|string|max:100',
            "email" => 'required|email|unique:users,email',
            "password" => 'required|string|min:6|confirmed'
        ]);
        if ($validator->fails()) {
            return response()->json([
                "msg" => $validator->errors()
            ], 409);
        }


        //create

        $request->password = bcrypt($request->password);

        $access_token = Str::random(64);

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password,
            "access_token" => $access_token,

        ]);

        return response()->json([

            "msg" => "category inserted sucessfuly",

        ], 201);

    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [

            "email" => 'required|email',
            "password" => 'required|string|min:6|confirmed',
        ]);

        $user = User::where("email", "=", $request->email)->first();
        if ($user != null) {
            $passwordCheck = hash::check($request->password, $user->password);

            if ($passwordCheck) {
                $userToken = Str::random(64);
                $user->update([
                    "userToken" => $userToken
                ]);


                return response()->json([
                    "message" => 'true',
                    "userToken" => $userToken

                ], 201);

            }
        } else
        {
            return response()->json([
                "msg" => ' not correct'
            ], 409);
        }
    }
public  function logout( Request $request){

        $access_token = $request->header("access_token");

        if($access_token !=null){
            $user = User::where('access_token', '=', $access_token)->first();

            if($user!=null){
                $user->update([
                    "access_token" => null
                ]);
                return response()->json([
                    "msg" => ' logged out successfuly'
                ],);
            }else{

                return response()->json([
                    "msg" => ' access token not correct'
                ], 409);
            }
        }else{
            return response()->json([
                "msg" => 'access token not found '
            ], 409);

        }
}

}
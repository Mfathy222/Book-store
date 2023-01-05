<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerform()
    {

        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            "name" => 'required|string|max:100',
            "email" => 'required|email|unique:users,email',
            "password" => 'required|string|min:6|confirmed'
        ]);

        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        Auth::login($user);
        return redirect(url('categories'));
    }

    //loogin form
    public function loginform()
    {

        return view('auth.login');
    }
    //login
    public function login(Request $request)
    {
        $data = $request->validate([

            "email" => 'required|email',
            "password" => 'required|string|min:6'
        ]);

        //check data


       $is_login= Auth::attempt(["email" => $data['email'], "password" => $data['password']]);
if($is_login !=true){
            return redirect(url('login'))->withErrors('wrong');
}

        return redirect(url('categories'));
    }
//logout

public function logout(){

        Auth::logout();
        return redirect(url('login'));

}





}
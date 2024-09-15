<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class AuthManager extends Controller
{
    public function login(){

        if(Auth::check()){
            return redirect()->route('home');
        }
        return view('login');
    }

    public function login_post(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('home'));
        }
        return redirect()->route('login')->with("error", "Login details are not valid");
    }

    public function register(){
        if(Auth::check()){
            return redirect()->route('home');
        }
        return view('register');
    }

    public function register_post(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);

        if(!$user){
            return redirect()->route('register')->with("error", "Registration failed");
        }

        return redirect()->route('login')->with("success", "Registration successful, please log in");
    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('home');

    }
}

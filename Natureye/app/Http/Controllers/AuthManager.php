<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class AuthManager extends Controller
{
    function login(){
        return view('login');
    }

    function loginPost(Request $request){
        
        Auth::logout();

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // get email and password only
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            return redirect()->intended(route('home'));
        }
        return redirect(route('login'))->with("error", "The your email or password are incorrect.")->withInput( $request->except('$password'));
        // if login failed
    }
    
    function signup(){
        return view('signup');
    }

    function signupPost(Request $request){
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed|required_with:password_confirmation'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);
        if(!$user){
            return redirect(route('signup'))->collator_sort_with_sort_keys("error", "login details are not valid")->withInput();
        }
        event(new Registered($user));

        $credentials = $request->only('email', 'password');

        Auth::attempt($credentials);

        return redirect(route('login'))->with("success", "Account has been created");
    }

    function logout(){
        Auth::logout();
        return redirect(route('login'));
    }
}

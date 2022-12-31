<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class AuthController extends Controller
{
    //
    public function LoginForm(){

        return inertia('Auth/Login');
    }
    public function registerForm(){

        return inertia('Auth/Register');
    }

    public function authenticate(Request $request){
       
        $credentilas = $request->validate([

            "email"=>['required','email'],
            "password"=>['required']
        ]);

        if(Auth::attempt($credentilas)){
            
            $request->session()->regenerate();

            $defaultRoute = route('home');

            $intended_route=\redirect()->intended($defaultRoute)->getTargetUrl();

            return Inertia::location($intended_route);
        }
        return redirect()->back()->withErrors([
            "email"=>'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function register(Request $request){

        $request->validate([
            "name"=>"required",
            "email"=>["required","email"],
            "password"=>"required",
        ]);

        User::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>Hash::make($request->password),
        ]);
        
        return redirect()->route('login')->with('message','Account created succefully');

    }
    public function logout(){

        Auth::logout();
        return inertia('Auth/Login');
    }
}

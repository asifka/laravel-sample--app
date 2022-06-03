<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController 
{
    public function login(){
        return view('admin_login');
    }

    public function doLogin(){
        $input = ['email' =>request('email'),'password' =>request('password')];
        if(auth()->guard('admin')->attempt($input, true)){
             return redirect()->route('admin.home');
        }
        else{
            return redirect()->route('admin.login')->with('message','Login is Invalid');
        }
    }

    public function homePage(){
        $users = User::withTrashed()->active()->latest()->paginate(10);
        return view('admin_home', compact('users'));
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('login');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function login()
    {
        return view('login');
    }
    
    public function home()
    {
        return view('user.home');
    }

    public function postlogin(Request $request)
    {
        $request->validate(
            [
                'email' => ['required', 'email'],
                'password' => ['required']
            ],
            [
                'email.required' => ' Email khong duoc de trong',
                'email.email' => 'Email khong dung dinh dang',
                'password.required' => ' Password khong duoc de trong',
            ]
        );

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->back()->with([
                'messageError' => 'Email or password khong dung'
            ]);
        };
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with([
            'messageError' => 'Logout thanh cong']);
    }
}

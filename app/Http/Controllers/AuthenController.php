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

    public function postLogin(Request $request)
{
    $request->validate(
        [
            'email' => ['required', 'email'],
            'password' => ['required']
        ],
        [
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không đúng định dạng.',
            'password.required' => 'Password không được để trống.'
        ]
    );

    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        // Redirect based on role
        return Auth::user()->role == '1' 
            ? redirect()->route('admin.dashboard') 
            : redirect()->route('users.home');
    }
    
    return redirect()->back()->with('messageError', 'Email hoặc password không đúng.');
}

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with([
            'messageError' => 'Logout thanh cong']);
    }
}

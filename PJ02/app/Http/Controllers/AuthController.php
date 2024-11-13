<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Str;
use Hash;
use Auth;

class AuthController extends Controller
{
    public function resigter()
    {
        return view('auth.resigter');
    }

    public function resigter_post(Request $request)
    {
        // Validate input data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6' // Xác nhận mật khẩu
        ]);

        // Create a new user instance
        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(50);
        $user->save(); // Save the user

        // Redirect with a success message
        return redirect('login')->with('success', 'Registration successful. Please log in.');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function login_post(Request $request)
    {
    if(Auth::attempt(['email' => $request -> $email, 'password' => $request-> $password],true))
        {
            if (Auth::User()->is_role == '1')
            {
                return redirect()-> intended('admin/dashboard');
            }
            else if (Auth::User()->is_role == '0')
            {
                echo "User"; die();
                //return redirect()-> intended('user/dashboard');
            }
            else
            {
                return redirect('login')->with('erorr', 'No Availbles Email.. Please check');
            }
        }
    else
        {
            return redirect() -> back() -> with('error', 'Please enter the correct credentials');
        }
    }   
    public function forgot()
    {
        return view('auth.forgot');
    }
}

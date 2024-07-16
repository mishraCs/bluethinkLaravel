<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PagerController extends Controller
{
    public function welcome()
    { 
        return view('welcome');
    }
    // Register
    public function register(Request $request)
    {
        if ($request->post()) {
            $request->validate([
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:8',
                'confirm_password' => 'required_with:password|same:password|min:8',
                'profile_image' => 'required|file|max:10000|mimes:jpg,jpeg,png,avif'
            ]);
        $imageName = time().'.'.$request->profile_image->extension();
        if($request->profile_image->move(public_path('images'), $imageName)){
            $user = [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'profile_image'=>'images/'.$imageName
            ];
            User::create($user);
            return redirect()->route('welcome')->with('success', 'Registration successful');
        }      
        } else {
            return view('register');
        }
    }
    // Login
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                return view('welcome');
            } else {
                return redirect()->route('login')->with('error', 'Invalid login details');
            }
        }
        return view('login');
    }
    // Logout
    public function logout()
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->tegenerateToken();
        return redirect()->route('login')->with('success', 'Logged out successfully');
    }
    //Profile
    function profile(){
        return view('profile');
    }
}

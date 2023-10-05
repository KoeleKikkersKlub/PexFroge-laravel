<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthenticationController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    
    public function attemptLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->route('homepage')->withSuccess('You have been logged in!');
        }
        return back()->withErrors([
            'email' => 'Your credentials do not match our records.'
        ])->onlyInput('email');
    }

    //     $user = User::where('email', $credentials['email'])->first();

    //     if ($user && !is_null($user->password)) {
    //         return response()->json(['isAuthenticated' => true]);
    //     } else {
    //         return response()->json(['isAuthenticated' => false]);
    //     }
    // }

    public function register()
    {
        $title = 'Register';
        return view('auth.register', compact('title'));
    }
    
    public function attemptRegistration(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);

        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('login')->withSuccess('You have been logged in!');
    }

    public function loggedIn()
    {
        if (Auth::check())
        {
            return view('homepage');
        }
        return redirect()->route('register')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have been logged out!');
    }
    public function homepage()
    {
        if (Auth::check())
        {
            return view('homepage');
        }
        return redirect()->route('login')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');
    }       
    public function checkEmail(Request $request)
    {
    $email = $request->input('email');
    $userExists = User::where('email', $email)->exists();

    return response()->json(['exists' => $userExists]);
    }
}
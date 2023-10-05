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
        'password' => 'required|min:8',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('homepage')->withSuccess('You have been logged in!');
    }

    // Check if the user exists based on email
    $user = User::where('email', $credentials['email'])->first();

    if (!$user) {
        if ($request->input('password') !== $request->input('confirm_password')) {
            return back()->withErrors([
                'password' => 'Passwords do not match.',
            ])->onlyInput('email');
        }

        $user = new User([
            'email' => $credentials['email'],
            'password' => Hash::make($credentials['password']),
        ]);
        $user->save();

        Auth::login($user);

        $request->session()->regenerate();
        return redirect()->route('homepage')->withSuccess('You have been registered and logged in!');
    }

    return back()->withErrors([
        'email' => 'Your credentials do not match our records.',
    ])->onlyInput('email');
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
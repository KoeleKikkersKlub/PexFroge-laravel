<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            return redirect()->route('homepage')->with('success', 'You have been logged in!');
        }

        return back()->withErrors(['email' => 'Your credentials do not match our records.']);
    }

    public function attemptRegister(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed'
        ]);

        $existingUser = User::where('email', $request->email)->first();

        if($existingUser)
        return back()->withErrors(['email' => 'Email address already in use.'])->withInput();

        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('homepage')
        ->withSuccess('You were logged in!');
    }

    public function loggedIn()
    {
        if (Auth::check()) {
            return view('homepage');
        }
        return redirect()->route('login')->withErrors(['email' => 'Please login to access the dashboard.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'You have been logged out!');
    }

    public function checkEmail(Request $request)
    {
    $email = $request->input('email');
    $userExists = User::where('email', $email)->exists();

    return response()->json(['exists' => $userExists]);
    }
}


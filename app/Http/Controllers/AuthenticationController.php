<?php

namespace App\Http\Controllers;

use App\Models\BedrijfUser;
use App\Models\ContactGegevens;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

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

        $cg = ContactGegevens::create();

        $user = new User();
        $user->cg_id = $cg->id;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();

        if(isset($request->company)){
            $this->createCompanyProfileView();
        }

        $profileController = new ProfileController();
        $profileController->editView();

        return redirect()->route('homepage')
        ->withSuccess('You were logged in!');
    }
    public function createStagemarktProfile()
    {
        dd('create stagemarkt profile');
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

    public function createCompanyProfileView(): View
    {
        return view('company.create');
    }

    public function createCompanyProfile()
    {

    }
}


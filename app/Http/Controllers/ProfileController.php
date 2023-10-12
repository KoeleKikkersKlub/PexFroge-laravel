<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function home(Request $request, $id)
    {
        $user = User::find($id);

        if ($user) {
            return view('profile', ['user' => $user]);
        } else {
            return redirect('login');
        }
    }
}

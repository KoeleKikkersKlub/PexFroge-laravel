<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ContactGegevens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function home(Request $request, $id)
    {
        $user = User::find($id);
        $data = ContactGegevens::where('id', $id)->first();

        if ($user) {
            return view('profile', [
                'user' => $user,
                'info' => $data,
        ]);
        } else {
            return redirect('login');
        }
    }
}

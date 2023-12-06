<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ContactGegevens;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function home(Request $request, $id)
    {
        $user = User::find($id);
        $data = ContactGegevens::where('id', $id)->first();

        if ($user) {
            return view('profile.profile', [
                'user' => $user,
                'info' => $data,
            ]);
        } else {
            return redirect('login');
        }
    }

    public function edit(Request $request, int $id)
    {
        $contactGegevens = ContactGegevens::find($id);

        $contactGegevens->update($request->all());

        return redirect()->route('profile', $id);
    }


    public function editView(int $id): View
    {
        $cg = ContactGegevens::where('id', $id)->first();
        return view('profile.edit')->with(['info' => $cg, 'id' => $id]);
    }
}

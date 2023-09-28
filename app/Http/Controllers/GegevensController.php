<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GegevensController extends Controller
{
    public function show($id){
        $user = user::find($id);

        return View::make('users.show')->with('user', $user)
    }
}

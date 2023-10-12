<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('homepage');
    } else {
        return view('auth.login');
    }
});

// requires login to access

Route::middleware(['auth'])->group(function () {

    Route::get('/stageoverzicht', function() {
        return view('stageoverzicht');
    })->name('stageoverzicht');

    Route::controller(ProfileController::class)->group(function()
    {
        Route::get('/profile/{user}/', 'home')->name('profile');
    });
    Route::controller(AuthenticationController::class)->group(function()
    {
        Route::get('/homepage', 'homepage')->name('homepage');
        Route::get('/logout', 'logout')->name('logout');
    });
});

// does not require login to access

Route::controller(AuthenticationController::class)->group(function()
{
    Route::get('/login', function() {
        return view('auth.login');
    })->name('login');

    Route::get('/register', function() {
        return view('auth.register');
    })->name('register');

    Route::post('/trylogin', 'attemptLogin')->name('attemptLogin');
    Route::post('/tryregister', 'attemptRegister')->name('attemptRegister');
});

?>
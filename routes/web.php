<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
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
    return view('app');
});

Route::controller(AuthenticationController::class)->group(function()
{
    Route::get('/register', function() {
        return view('register');
    })->name('register');
    
    Route::get('/login', function() {
        return view('login');
    })->name('login');

    Route::get('/stageoverzicht', function() {
        return view('stageoverzicht');
    })->name('stageoverzicht');
    Route::post('/tryregister', 'attemptRegistration')->name('attemptRegistration');
    Route::post('/check-email', 'checkEmail')->name('checkEmail');
    Route::post('/trylogin', 'attemptLogin')->name('attemptLogin');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/homepage', 'homepage')->name('homepage');
})


?>
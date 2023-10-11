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
    Route::get('/login', function() {
        return view('auth.login');
    })->name('login');

    Route::get('/register', function() {
        return view('auth.register');
    })->name('register');

    Route::get('/stageoverzicht', function() {
        return view('stageoverzicht');
    })->name('stageoverzicht');

    Route::post('/check-email', 'checkEmail')->name('checkEmail');
    Route::post('/trylogin', 'attemptLogin')->name('attemptLogin');
    Route::post('/tryregister', 'attemptRegister')->name('attemptRegister');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/homepage', 'homepage')->name('homepage');
    Route::get('/register', 'register')->name('register');
    Route::get('/login', 'login')->name('login');

    //COMPANY
    Route::get('/company/register', 'companyRegister')->name('company.register.show');
    Route::get('company/register/contact', 'companyRegisterContact')->name('company.register.contact.show');
})
?>

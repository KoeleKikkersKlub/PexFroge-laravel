<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrajectController;
use App\Http\Controllers\ImportController;



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

// requires login to access
Route::get('/', function () {
    return redirect('homepage');
});

Route::middleware(['auth'])->group(function () {
    
    Route::get('/stageoverzicht', function() {
        return view('stageoverzicht');
    })->name('stageoverzicht');

    Route::controller(TrajectController::Class)->group(function()
    {
        Route::get('/homepage', 'TrajectData')->name('homepage');
    });

    Route::controller(ProfileController::class)->group(function()
    {
        Route::get('/profile/{user}/', 'home')->name('profile');
    });

    Route::controller(AuthenticationController::class)->group(function()
    {
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

Route::get('/create-traject', [TrajectController::class, 'createTrajectForm'])->name('create.traject.form');
Route::post('/store-traject', [TrajectController::class, 'storeTraject'])->name('store.traject');


Route::get('/import', [ImportController::class, 'showForm'])->name('import.form');
Route::post('/import', [ImportController::class, 'import'])->name('import');
?>

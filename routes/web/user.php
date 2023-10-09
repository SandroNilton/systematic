<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProcedureController;

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

Route::middleware(['verified', 'auth', 'user-access:user'])->group(function (){
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('profile', 'profile')->name('profile');
    Route::resource('procedures', ProcedureController::class);
});
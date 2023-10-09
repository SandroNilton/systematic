<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProcedureController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\RequirementController;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\TypeprocedureController;

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

Route::middleware(['auth', 'user-access:admin'])->prefix('admin')->name('admin.')->group(function (){
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('requirements', RequirementController::class);
    Route::resource('areas', AreaController::class);
    Route::resource('typeprocedures', TypeprocedureController::class);
    Route::resource('procedures', ProcedureController::class);
});
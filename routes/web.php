<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('crud', UserController::class);
route::post('/user' ,[UserController::class  , 'store'])->name('user');
Route::get('/delete/{id}' , [UserController::class  , 'destroy'])->name('delete');
route::get('/edit/{id}' , [userController::class , 'edit'])->name('edit');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Session;
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

//Trial
Route::get('/registration', function () { return view('pages/access/register');});
Route::post('/register', [AccessController::class, 'register']); 
//Auth
Route::get('/', function () { return view('pages/access/login');});
//Access GET
Route::get('/login', function () { return view('pages/access/login');});
Route::get('/history', [AccessController::class, 'getHistory']);
Route::get('/logout', [AccessController::class, 'userLogout']); 
//Access POST
Route::post('/user-login', [AccessController::class, 'userLogin']); 
//Internal GET method
Route::get('/dashboard', [DashboardController::class, 'getDashboard'])->middleware('loggedID');
//Account Management
Route::get('/account', function () { return view('pages/modules/accountManagement');});
Route::get('/get/account', [AccountController::class, 'getAccount']); 
Route::get('/get/account/{id}', [AccountController::class, 'getSpecificAccount']); 
Route::post('/add/account', [AccountController::class, 'addAccount']); 
Route::put('/update/account/{id}', [AccountController::class, 'updateAccount']); 

// Example
Route::get('articles/{id}', function($id) {
    return Article::find($id);
});
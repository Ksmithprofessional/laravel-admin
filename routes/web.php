<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeesController;

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

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/companies', [CompaniesController::class, 'index'])->middleware('auth');
Route::get('/employees', [EmployeesController::class, 'index'])->middleware('auth');

Route::get('/createcompany', [CompaniesController::class, 'create'])->middleware('auth');
Route::get('/createemployee', [EmployeesController::class, 'create'])->middleware('auth');

Route::post('/createcompany', [CompaniesController::class, 'store'])->middleware('auth');
Route::post('/createemployee', [EmployeesController::class, 'store'])->middleware('auth');

// these break when accessing directly (get not supported), maybe add route get redirect function?
Route::post('/editcompany', [CompaniesController::class, 'edit'])->middleware('auth');
Route::post('/editemployee', [EmployeesController::class, 'edit'])->middleware('auth');

Route::post('/updatecompany', [CompaniesController::class, 'update'])->middleware('auth');
Route::post('/updateemployee', [EmployeesController::class, 'update'])->middleware('auth');

Route::delete('/companies', [CompaniesController::class, 'destroy'])->middleware('auth');
Route::delete('/employees', [EmployeesController::class, 'destroy'])->middleware('auth');

//redirects
Route::get('/editcompany', function(){

    redirect('/home');
})->middleware('auth');
Route::get('/editemployee', function(){

    redirect('/home');
})->middleware('auth');

Route::get('/updatecompany', function(){

    redirect('/home');
})->middleware('auth');
Route::get('/updateemployee', function(){

    redirect('/home');
})->middleware('auth');


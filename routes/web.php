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

Route::get('/companies', [CompaniesController::class, 'index'])->middleware('auth')->name('companies');
Route::get('/employees', [EmployeesController::class, 'index'])->middleware('auth')->name('employees');

Route::get('/createcompany', [CompaniesController::class, 'create'])->middleware('auth')->name('createcompany');
Route::get('/createemployee', [EmployeesController::class, 'create'])->middleware('auth')->name('createemployee');

Route::post('/createcompany', [CompaniesController::class, 'store'])->middleware('auth')->name('createcompany');
Route::post('/createemployee', [EmployeesController::class, 'store'])->middleware('auth')->name('createemployee');

// these break when accessing directly (get not supported), maybe add route get redirect function?
Route::post('/editcompany', [CompaniesController::class, 'edit'])->middleware('auth')->name('editcompany');
Route::post('/editemployee', [EmployeesController::class, 'edit'])->middleware('auth')->name('editemployee');

Route::post('/updatecompany', [CompaniesController::class, 'update'])->middleware('auth')->name('updatecompany');
Route::post('/updateemployee', [EmployeesController::class, 'update'])->middleware('auth')->name('updateemployee');

Route::delete('/companies', [CompaniesController::class, 'destroy'])->middleware('auth')->name('deletecompany');
Route::delete('/employees', [EmployeesController::class, 'destroy'])->middleware('auth')->name('deleteemployee');

Route::post('company/{any}', [EmployeesController::class, 'specificIndex'])->where('any', '.*')->middleware('auth')->name('specific');

//redirects
Route::get('/editcompany', function(){

    return redirect('/companies')->withErrors(['msg' => 
    'Something went wrong. 
    If you were updating a company then please try again 
    and make sure all required fields are filled, and formatted correctly (email@email.com or http://www.yourwebsite.com)'
    ]);
})->middleware('auth');

Route::get('/editemployee', function(){

    return redirect('/employees')->withErrors(['msg' => 
    'Something went wrong. 
    If you were updating an employee then please try again 
    and make sure all required fields are filled, and formatted correctly (email@email.com or a uk phone number with no spaces)'
    ]);
})->middleware('auth');

Route::get('/updatecompany', function(){

    return redirect('/companies')->withErrors(['msg' => 
    'Something went wrong. 
    If you were updating a company then please try again 
    and make sure all required fields are filled, and formatted correctly (email@email.com or http://www.yourwebsite.com)'
    ]);
})->middleware('auth');

Route::get('/updateemployee', function(){

    return redirect('/employees')->withErrors(['msg' => 
    'Something went wrong. 
    If you were updating an employee then please try again 
    and make sure all required fields are filled, and formatted correctly (email@email.com or a uk phone number with no spaces)'
    ]);
})->middleware('auth');

Route::get('/company/{any}', function(){

    return redirect('/companies')->withErrors(['msg' => 
    'Something went wrong. 
    If you were looking for a specific company then please try the links on this page.'
    ]);
})->where('any', '.*')->middleware('auth');


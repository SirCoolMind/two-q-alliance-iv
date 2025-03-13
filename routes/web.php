<?php

use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Company Module
Route::get('/companies', CompanyController::class .'@index')->name('companies.index');
Route::get('/companies/create', CompanyController::class . '@create')->name('companies.create');
Route::post('/companies', CompanyController::class .'@store')->name('companies.store');
Route::get('/companies/{company}', CompanyController::class .'@show')->name('companies.show');
Route::get('/companies/{company}/edit', CompanyController::class .'@edit')->name('companies.edit');
Route::put('/companies/{company}', CompanyController::class .'@update')->name('companies.update');
Route::delete('/companies/{company}', CompanyController::class .'@destroy')->name('companies.destroy');

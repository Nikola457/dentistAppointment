<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FullCalendarController;
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
    return view('layout/index');
});

Route::resource('schedule', 'App\Http\Controllers\ScheduleController');
Route::resource('dashboard', 'App\Http\Controllers\HomeController');
Route::get('patients', 'App\Http\Controllers\HomeController@showAllPatients');
//Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('unscheduled', 'App\Http\Controllers\HomeController@unscheduled');
Route::get('full-calender',[FullCalendarController::class,'index']);
Route::post('full-calender/action',[FullCalendarController::class,'action']);   
Route::get('dashboard/show/{id}' ,'App\Http\Controllers\HomeController@showDashboard');
Route::get('unscheduled/show/{id}','App\Http\Controllers\ScheduleController@show');
Auth::routes();


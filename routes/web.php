<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('test',function(){
	date_default_timezone_set('Asia/Jakarta');
	$schedules=App\Models\Schedule::with('instaAccount')->get();
	echo dd($schedules);
});

Route::resource('instaaccount','InstaAccountController');

Route::resource('schedule','ScheduleController');

Route::get('run','ScheduleController@runSchedule');

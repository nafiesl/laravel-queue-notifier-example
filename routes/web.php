<?php

use App\Jobs\LongRunJob;
use App\Jobs\LongRunPrivateJob;
use Illuminate\Support\Facades\Route;

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

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/long-run-job', function () {
    dispatch(new LongRunJob());

    flash('Please wait, your request is processing...');
    return redirect()->home();
})->name('long-run-job');

Route::get('/private-long-run-job', function () {
    dispatch(new LongRunPrivateJob(auth()->id()));

    flash('Please wait, your request is processing...');
    return redirect()->home();
})->name('private-long-run-job');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

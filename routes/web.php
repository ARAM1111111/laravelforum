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
	$threeds = App\Threed::paginate(15);
    return view('welcome',compact('threeds'));
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::resource('threed', 'ThreedController');
Route::resource('comment','CommentController',['only'=>['update', 'destroy']]);
Route::post('comment/create/{threed}', 'CommentController@addThreedComment')->name('threedcomm.store');

Route::post('replay/create/{comment}', 'CommentController@addReplayComment')->name('replaycomment.store');
<?php

use App\Events\MessagePosted;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/about', 'PagesController@aboutIndex');
Route::get('/chat', 'ChatController@index');
Route::get('/messages', 'ChatController@showChat');

// Route::post('/messages', 'ChatController@postMsg');

Route::post('/messages', function(){
	$user = Auth::user();

	$message = $user->messages()->create([
	    'message' => request()->get('message')
	]);

	//Announce new message has been posted
	broadcast(new MessagePosted($message, $user))->toOthers();
});

Route::get('/', 'PagesController@index');

// resource controller CRUD
Route::resource('posts', 'PostsController');

Auth::routes();

// Dashboard of user
Route::get('/home', 'HomeController@index')->name('home');

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

//MIDDLEWARE FOR BACK BUTTON
Route::middleware(['revalidate'])->group(function(){

Route::get('/', 'PagesController@index');
//temporary closure / replace with new controller 
Route::get('/about', function(){
	return view ('pages.about');
});

//chat and messages
Route::get('/chat', 'ChatController@index');
Route::get('/messages', 'ChatController@showChat');

	// Route::post('/messages', 'ChatController@postMsg'); **not working **
Route::post('/messages', function(){
	
	$user = Auth::user();

	$message = $user->messages()->create([
	    'message' => request()->get('message')
	]);

	//Announce new message has been posted
	broadcast(new MessagePosted($message, $user))->toOthers();
});

// CRUD for Blog posting
Route::resource('posts', 'PostsController');

//Authentication login
Auth::routes();

// Dashboard of user
Route::get('/home', 'HomeController@index')->name('home');

//PROFILE
Route::prefix('profile')->group(function () {
	// Page
Route::get('/', 'ProfileController@index')->name('profile');
	// Edit 
Route::get('/edit', 'ProfileController@editProfile');
Route::patch('/edit','ProfileController@update');
	// Change Password
Route::get('/change_password', 'ProfileController@passwordIndex');
Route::patch('/change_password', 'ProfileController@changePassword');
});
//END OF PROFILE

});



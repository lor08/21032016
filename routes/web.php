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
use App\Models\User;

Route::get('/', function () {
	$user = User::find(1);
	Sentinel::loginAndRemember($user);
	return "Hello World";
//	dd( Auth::getSession()->getId() );
//    return view('welcome');
});
Route::get('/logout', function () {
	Sentinel::logout();
	return back();
})->name("logout");

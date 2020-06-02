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

Route::get('/search', 'SearchController@users');

Route::resource('/users', 'UsersController');
Route::resource('/comments', 'CommentsController');
Route::resource('/events', 'EventsController');
Route::resource('/tasks', 'TasksController');
Route::resource('/budget', 'BudgetsController');

Route::get('/wall', 'WallsController@index');

Route::get('users/{user}/friend', 'FriendsController@index');
Route::post('/friends/{friend}', 'FriendsController@add');
Route::patch('/friends/{friend}', 'FriendsController@accept');
Route::delete('/friends/{friend}', 'FriendsController@destroy');

Route::get('user-avatar/{id}/{size}', 'ImagesController@userAvatar');

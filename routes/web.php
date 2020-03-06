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


//All Registration and login route
Auth::routes(['verify' => true]);

//Home route
Route::get('/home', 'HomeController@index')->name('home');

//Add Note
Route::get('/note', 'NoteController@noteShow')->name('note');
Route::post('/note', 'NoteController@noteProcess')->name('note');

//Edit and update route
Route::get('/note/{id}', 'NoteController@edit')->name('note-edit');
Route::post('/note/{id}', 'NoteController@updateNote')->name('note-edit');

//update route
Route::get('/note/delete/{id}', 'NoteController@del');



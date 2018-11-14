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

Route::get('/',  'UsersController@index');
Auth::routes();
Route::resource('users', 'UsersController', ['only' => ['show','edit','update', 'index']]);
Route::resource('roles', 'RolesController', ['only' => ['index']]);
Route::resource('subjects', 'SubjectsController');
Route::resource('questions', 'QuestionsController',['except' => ['index', 'create', 'edit']]);
Route::get('/questions/type/{type}','QuestionsController@index')->name('questions.index');
Route::get('/questions/create/type/{type}','QuestionsController@create')->name('questions.create');
Route::get('/questions/{question}/edit/type/{type}', 'QuestionsController@edit')->name('questions.edit');
Route::resource('papers', 'PapersController');
Route::get('/papers/questions/type/{type}', 'PapersController@questions')->name('papers.questions');
Route::post('/papers/submit', 'PapersController@submit')->name('papers.submit');


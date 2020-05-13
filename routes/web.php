<?php

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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::namespace('User')->prefix('user')->name('user.')->middleware('can:repondre')->group(function(){
//     Route::resource('/candidatures/{id}/repondre','CandidaturesController@storeTest', ['except' => ['create','show','store']]);
// });

// Route::resource('/candidatures/{id}/repondre', 'CandidaturesController@storeTest');

// Route::get('/candidatures/{id}/repondre', 'CandidaturesController@storeTest');

Route::resource('candidatures', 'CandidaturesController');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users','UsersController', ['except' => ['create','show','store']]);
});

// Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-all-candidature')->group(function(){
//     Route::resource('/candidatures','CandidaturesController', ['except' => ['create','show','store']]);
// });

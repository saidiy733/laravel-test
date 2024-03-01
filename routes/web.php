<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {
    return view('welcome');
});


Route::get('/','HomeController@index' )->name('home');
Route::get('/post/{slug}','HomeController@show' )->name('post.show');
Route::get('/create/post','HomeController@create' )->name('post.create');
Route::post('/add/post','HomeController@store' )->name('post.store');
Route::get('/edit/post/{slug}','HomeController@edit' )->name('post.edit');
Route::put('/update/post/{slug}','HomeController@update' )->name('post.update');
Route::delete('/update/delete/{slug}','HomeController@delete' )->name('post.delete');



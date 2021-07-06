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

Route::get('/','App\Http\Controllers\StudentController@index')->name('home');
Route::get('/create','App\Http\Controllers\StudentController@create')->name('create');
Route::post('/store','App\Http\Controllers\StudentController@store')->name('store');
Route::get('/edit/{id}','App\Http\Controllers\StudentController@edit')->name('edit');
Route::post('/update/{id}','App\Http\Controllers\StudentController@update')->name('update');
Route::get('/delete-data/{id}','App\Http\Controllers\StudentController@deleteData')->name('deleteData');


Route::get('/test','App\Http\Controllers\TestController@index');

Route::get('/hello', function () {
    return "Hello world";
});

Route::get('/users/{id}', function ($id) {
    return "your id is $id";
});


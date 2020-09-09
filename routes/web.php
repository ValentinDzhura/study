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

Route::middleware(['auth'])->group(function () {
    Route::redirect('/', '/articles');
    Route::resource('/articles', 'ArticleController');
        
    
    Route::get('/comment/{id}/edit', 'CommentController@edit');
    Route::post('/articles/{id}', 'CommentController@store');
    Route::delete('/comment/{id}', 'CommentController@destroy');
    Route::patch('/update/{id}', 'CommentController@update');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('index');



<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*------------------------------------------*\
        Pattern (securite)
\*------------------------------------------*/
Route::pattern('id', '[1-9][0-9]*');


/*------------------------------------------*\
        Blog
\*------------------------------------------*/
Route::get('/', 'BlogController@index');
Route::get('conference/{id}/{slug?}', 'BlogController@showPost');
Route::get('about', 'BlogController@about');
Route::get('term', 'BlogController@term');
Route::get('contact', 'BlogController@contact');
Route::get('contact', 'FrontController@postContact');

Route::get('tag/{id}', 'BlogController@showTag');

/*------------------------------------------*\
       Auth
\*------------------------------------------*/
Route::Controllers([
    'auth'  => 'Auth\AuthController',
    'password'  => 'Auth\PasswordController',
]);

/*------------------------------------------*\
        Controller REST
\*------------------------------------------*/
Route::resource('comment', 'CommentController');
Route::resource('post', 'PostController');


/*------------------------------------------*\
       Dashbord
\*------------------------------------------*/
Route::get('dashboard', 'DashboardController@index');



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

//
// Route::get('/followers', function () {
//     return view('followers');
// });
// Route::get('/following', function () {
//     return view('following');
// });

Route::get('/timeline',  'PostsController@timeline');

Route::get('/myprofile', function () {
    return view('myprofile');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/searchusers', function () {
    return view('searchusers');
});

Route::get('/editdescription', function () {
    return view('editdescription');
});

Route::get('/user/{user}', 'ProfileController@show');

Route::get('/find', 'ProfileController@find');

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/newpost', 'PostsController@create');

Route::post('/posts', 'PostsController@store');

Route::get('/posts/{post}', 'PostsController@show');

Route::get('/delete-post/{post_id}', [
    'uses' => 'PostsController@destroy' ,
    'as' => 'post.delete'
]);

//Route::post('/update/{id}', 'ProfileController@update');


Route::get('/register', 'RegistrationController@create');

Route::post('/register', 'RegistrationController@store');


Route::get('/login', 'SessionsController@create');

Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');

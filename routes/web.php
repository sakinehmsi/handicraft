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
    return view('index');
});

Route::get('/artist/{id}', 'artistController@showArtist')->name('artist');

Route::get('/artists', 'artistController@showArtists')->name('artists');

Route::get('/', 'indexController@showAll')->name('posts');

Route::post('/artist/unlikePost', 'artistController@checkunLikeStatus')->name('unlikePost');
Route::post('/artist/likePost', 'artistController@checkLikeStatus')->name('likePost');

Route::get('/userLogin', 'userController@signin');
Route::get('/userLogin', 'userController@signup');
Route::get('/userLogin/{id}', 'userController@favourites');

Route::get('/login', 'loginController@showArtists')->name('login');












// Route::get('/artists',function(){
//     return view('artists');
// })->name('artists');


// Route::get('/artists',function(){
//     return view('artists');
// })->name('artists');
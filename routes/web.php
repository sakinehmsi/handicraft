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


    
//show home page
Route::get('/', 'indexController@showAll')->name('posts');

//sign up and sign in as artist
Route::get('/joinUS', 'artistController@showsignform')->name('signform');
Route::post('/signup-artist', 'artistController@signupArtist')->name('signUp');
Route::post('/signIn', 'artistController@signinArtist')->name('signIn');

//show artist_profile for artist
Route::get('/artist/{id}', 'artistController@showArtist')->name('myprofile');

//drop post
Route::post('/artist/dropPost', 'artistController@dropPost')->name('dropPost');

//add post :(
//Route::post('/artist/addPost', 'artistController@addPost')->name('addPost');

//show all artists
Route::get('/artists', 'userController@showArtists')->name('artists');

//show artist_profile for user
Route::get('/user/artist/{id}', 'userController@showArtist')->name('artist');

//like and unlike a post in artist profile by user
Route::post('/artist/unlikePost', 'userController@checkunLikeStatus')->name('unlikePost');
Route::post('/artist/likePost', 'userController@checkLikeStatus')->name('likePost');

//show UserFavourites_Post for user 
Route::get('/myfavourites', 'userController@favourites');

//login user
Route::get('/login', 'loginController@showArtists')->name('login');












// Route::get('/artists',function(){
//     return view('artists');
// })->name('artists');


// Route::get('/artists',function(){
//     return view('artists');
// })->name('artists');
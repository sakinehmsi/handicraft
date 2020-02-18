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
Route::get('/', 'indexController@showAll');
Route::get('category/{id}', 'indexController@showCategory')->name('category');

//sign up and sign in as user
Route::get('login', 'AuthController@showlogin')->name('login');
Route::post('post-login', 'AuthController@postLogin');
Route::get('registration', 'AuthController@registration')->name('registration');
Route::post('post-registration', 'AuthController@postRegistration');
Route::get('dashboard', 'AuthController@dashboard')->name('dashboard');
Route::get('logout', 'AuthController@logout');


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



Route::get('/designers', 'designerController@show');

Route::get('/reduction', 'reductionController@showAll')->name('posts');

Route::get('/cart/{id}', 'cartController@show');

Route::post('/cart/add', 'cartController@add_To_Cart')->name('add');

Route::post('/cart/delete', 'cartController@delete_from_Cart')->name('delete');






// Route::get('/artists',function(){
//     return view('artists');
// })->name('artists');


// Route::get('/artists',function(){
//     return view('artists');
// })->name('artists');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\PhotoController;

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
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});
Route::view('/story', 'story');

Route::get('/events', function () {
    return view('events');
});

Route::get('/test', function () {
    return view('test-page');
});

//Route::view('/createalbum', 'createalbum');

// Route::middleware(['auth:sanctum', 'verified'])->get('/home', function () {
//     return view('home');
// })->name('home');


Route::get('/admin', function () {
    return view('admin.index');
});



//======ALL ALBUM ROUTES=======
//read albums
//Route::get('/albums', 'AlbumController@read');
Route::get('/albums', [AlbumController::class, 'read']);

//read an album's photos
//Route::get('/albums/open_album/{id}', 'AlbumController@open_album');
Route::get('/albums/open_album/{id}', [AlbumController::class, 'open_album']);

//create routes
//Route::get('/create_album', 'AlbumController@create');
Route::get('/createalbum', [AlbumController::class, 'create'])->middleware('auth');

//Route::post('/create_album', 'AlbumController@store');
Route::post('/createalbum', [AlbumController::class, 'store'])->middleware('auth');

//edit routes
//Route::get('/edit_album/{id}', 'AlbumController@edit');
Route::get('/edit_album/{id}', [AlbumController::class, 'edit'])->middleware('auth');
//Route::post('/edit_album/{id}', 'AlbumController@update');
Route::get('/edit_album/{id}', [AlbumController::class, 'update'])->middleware('auth');

//delete route
//Route::get('/delete/{id}', 'AlbumController@destroy');
Route::get('/delete/{id}', [AlbumController::class, 'destroy'])->middleware('auth');




//=====ALL PHOTO ROUTES==========
//read an image
Route::get('/photo/{id}', [PhotoController::class, 'show']);

//create routes
Route::get('/create_photo/{id}', [PhotoController::class, 'create'])->middleware('auth');
Route::post('/create_photo', [PhotoController::class, 'store'])->middleware('auth');

//edit routes
Route::get('/edit_photo/{id}', 'PhotoController@edit')->middleware('auth');
Route::post('/edit_photo/{id}', 'PhotoController@update')->middleware('auth');

//delete route
Route::get('/delete_photo/{id}', 'PhotoController@destroy')->middleware('auth');
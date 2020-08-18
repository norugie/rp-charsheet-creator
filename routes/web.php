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

// Character Routes - Create
Route::get( '/create', 'CharacterController@createCharacterForm' );
Route::post( '/create', 'CharacterController@createCharacter');
Route::get( '/publish/{slug}', 'CharacterController@publishCharacter' );

// Character Routes - Show
Route::get( '/', 'CharacterController@showCharacterList' );
Route::get( '/character/{slug}', 'CharacterController@showCharacterInfo' );
Route::get( '/users/{username}', 'CharacterController@showCharacterListPerUser' );
Route::post( '/search', 'CharacterController@searchCharacter' );

// Miscellaneous Routes
Route::post( '/upload/{type}', 'IndexController@uploadImage' );
Route::post( '/delete/gallery', 'IndexController@deleteImage' );

// Auth
Auth::routes();

// User Routes - Home Page
Route::get('/dashboard', 'HomeController@index')->name('home');

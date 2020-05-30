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

// Character Routes
Route::get( '/', 'CharacterController@showCharacterList' );
Route::get( '/character/{id}', 'CharacterController@showCharacterInfo' );
Route::get( '/create', 'CharacterController@createCharacterForm' );
Route::get( '/users/{username}', 'CharacterController@showCharacterListPerUser' );
Route::post( '/search', 'CharacterController@searchCharacter' );
route::post( '/create', 'CharacterController@createCharacter');

// User Routes
Route::get( '/login', 'IndexController@login' );

// Miscellaneous Routes
Route::post( '/upload', 'IndexController@uploadImageTinyMCE' );

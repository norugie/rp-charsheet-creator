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

Route::get('/', 'IndexController@showIndexInfo');

// Character Routes
Route::get('/character/{id}', 'CharacterController@showCharacterInfo');
Route::get('/create', 'CharacterController@createCharacter');

// User Routes
Route::get('/login', 'IndexController@login');
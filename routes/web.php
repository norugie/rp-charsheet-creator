<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CharacterController;

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
Route::get('/create', [CharacterController::class, 'createCharacterForm']);
Route::post( '/create', [CharacterController::class,'createCharacter']);
Route::get( '/publish/{slug}', [CharacterController::class, 'publishCharacter'] );

// Character Routes - Show
Route::get( '/', [CharacterController::class, 'showCharacterList'] );
Route::get( '/character/{slug}', [CharacterController::class, 'showCharacterInfo'] );
Route::get( '/users/{username}', [CharacterController::class, 'showCharacterListPerUser'] );
Route::post( '/search', [CharacterController::class, 'searchCharacter'] );

// Miscellaneous Routes
Route::post( '/upload/{type}', [IndexController::class, 'uploadImage'] );
Route::post( '/delete/gallery', [IndexController::class, 'deleteImage'] );

// Auth
Auth::routes();

Route::group(['middleware' => 'auth', 'name' => 'login'], function (){
    // User Routes - Home Page
    Route::get('/dashboard', [HomeController::class, 'index'] );
    Route::get('/account', [HomeController::class, 'account'] );

    // Character Routes - Update
    Route::get('/character/{slug}/update', [CharacterController::class, 'updateCharacterForm']);

});

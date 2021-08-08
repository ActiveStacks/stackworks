<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;


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

//Route::get('/home', 'WelcomeController@home');

Route::get('/',  [PagesController::class, 'home']);
Route::get('/about', [PagesController::class, 'about']);
Route::get('/services', [PagesController::class, 'services']);
Route::get('/show/{id}', [PagesController::class, 'show']);
Route::get('/create', [PagesController::class, 'create']);
Route::post('/saveproduct', [PagesController::class, 'saveproduct']);
Route::get('/edit/{id}', [PagesController::class, 'editproduct']);
Route::post('/update', [PagesController::class, 'updateproduct']);
Route::get('/delete/{id}',[PagesController::class, 'deleteproduct']);

Route::resource('products', ProductController::class);




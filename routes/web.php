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

Route::get('/', function () {
    return view('portada');
});


Route::get('/articulos/crear/', "App\Http\Controllers\PostController@create");
Route::get('/articulos/{post}/editar', "App\Http\Controllers\PostController@edit");
Route::resource(
    'articulos',
    'App\Http\Controllers\PostController',
    ['except' => ['create', 'edit']]
);

Route::get('/categorias/crear/', "App\Http\Controllers\CategoryController@create");
Route::get('/categorias/{category}/editar', "App\Http\Controllers\CategoryController@edit");
Route::resource(
    'categorias',
    'App\Http\Controllers\CategoryController',
    ['except' => ['create', 'edit']]
);


Route::get('/{category}', "App\Http\Controllers\CategoryController@list");
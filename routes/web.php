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

Route::get('/', "App\Http\Controllers\PostController@portada");

Route::get('/articulos/crear/', "App\Http\Controllers\PostController@create");
Route::get('/articulos/{articulo}/editar', "App\Http\Controllers\PostController@edit");
Route::resource(
    'articulos',
    'App\Http\Controllers\PostController',
    ['except' => ['create', 'edit']]
);

Route::get('/categorias/crear/', "App\Http\Controllers\CategoryController@create");
Route::get('/categorias/{categoria}/editar', "App\Http\Controllers\CategoryController@edit");
Route::resource(
    'categorias',
    'App\Http\Controllers\CategoryController',
    ['except' => ['create', 'edit']]
);


Route::get('/{categoria}', "App\Http\Controllers\CategoryController@list");
Route::get('/{categoria}/{articulo}-{slug}', "App\Http\Controllers\PostController@list");
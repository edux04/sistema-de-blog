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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/testing', "App\Http\Controllers\PostController@api")->middleware('auth');

Route::get('/testing/api', "App\Http\Controllers\PostController@testApi")->middleware('auth');

Route::get('/', "App\Http\Controllers\PostController@portada");

Route::get('/busqueda/', "App\Http\Controllers\PostController@search");
Route::get('/articulos/crear/', "App\Http\Controllers\PostController@create")->middleware('auth');
Route::get('/articulos/{articulo}/editar', "App\Http\Controllers\PostController@edit");
Route::resource(
    'articulos',
    'App\Http\Controllers\PostController',
    ['except' => ['create', 'edit']]
)->middleware('auth');

Route::get('/categorias/crear/', "App\Http\Controllers\CategoryController@create")->middleware('auth');
Route::get('/categorias/{categoria}/editar', "App\Http\Controllers\CategoryController@edit")->middleware('auth');
Route::resource(
    'categorias',
    'App\Http\Controllers\CategoryController',
    ['except' => ['create', 'edit']]
)->middleware('auth');


Route::get('/{categoria}', "App\Http\Controllers\CategoryController@list");
Route::get('/{categoria}/{articulo}-{slug}', "App\Http\Controllers\PostController@list");
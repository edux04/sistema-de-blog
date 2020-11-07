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
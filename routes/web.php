<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/', 'App\Http\Controllers\PostController@Inicio');
Route::get('/newPost',function () {
    return view('crearPost');
});

Route::get('/crearUsuario', function () {
    return view('crearUsuario');
});
Route::post('/crearUsuario','App\Http\Controllers\UsuarioController@createUser');

Route::get("/perfil/{d}",'App\Http\Controllers\UsuarioController@showProfile');
Route::get('/editPost','App\Http\Controllers\PostController@editPostForm');
Route::post('/editPost','App\Http\Controllers\PostController@editPost');

Route::post('/newPost','App\Http\Controllers\PostController@newPost');


Route::get('/login', function () {
    return view('login');
});
Route::post('/login','App\Http\Controllers\UsuarioController@autenticar');

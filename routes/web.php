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

Route::get('/',[\App\Http\Controllers\MainController::class,'Index'])->name("post.list");;
Route::get('/AddPost',[\App\Http\Controllers\MainController::class,'AddPost']);
Route::get('/UpdatePost/{id}',[\App\Http\Controllers\MainController::class,'UpdatePost']);
Route::get('/ShowPost/{id}',[\App\Http\Controllers\MainController::class,'ShowPost']);
Route::post('/posts/upload', [\App\Http\Controllers\MainController::class, 'UploadImage']);
Route::post('/posts/createPost', [\App\Http\Controllers\MainController::class, 'CreatePost'])->name("post.create");
Route::post('/posts/createPost', [\App\Http\Controllers\MainController::class, 'ChangePost'])->name("post.update");


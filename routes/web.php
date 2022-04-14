<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\chatController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\PostlikeController;
use App\Http\Controllers\UserpostController;
use App\Http\Controllers\roomController;



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
Route::get('/home',[homeController::class,'index'])->name('home');


Route::get('/users/{user:username}/posts',[UserpostController::class,'index'])->name('users.posts');
Route::get('/users/profile',[UserpostController::class,'userProfile'])->name('userProfile');

Route::post('/login',[LoginController::class,'store'])->name('login');
Route::get('/login',[LoginController::class,'index'])->name('login');


Route::post('/logout',[LogoutController::class,'store'])->name('logout');


Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard')->middleware('auth');
Route::post('/register',[RegisterController::class,'store'])->name('register');


Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::get('/posts',[PostController::class,'index'] )->name('posts');
Route::post('/posts',[PostController::class,'store'] )->name('posts');
Route::delete('/posts/{post}',[PostController::class,'destory'])->name('posts.destory');
Route::get('/update/{post:id}/posts',[postController::class,'showdata'])->name('posts.showdata');
Route::put('/update/{post:id}/posts',[postController::class,'update'])->name('posts.update');
//Route::get('/posts/{post:id}',[postController::class,'selectOnly'])->name('posts.showdata');

Route::post('/posts/{post}/likes',[PostlikeController::class,'store'])->name('posts.like');
Route::delete('/posts/{post:id}/likes',[PostlikeController::class,'destroy'])->name('posts.like');

Route::get('/chat/{user:id}',[chatController::class,'index'])->name('chat.page');
Route::post('/chat/{user:id}',[chatController::class,'message'])->name('chat.page');

Route::get('/chatlist',[roomController::class,'index'])->name('list');
Route::delete('/chat/{message}',[chatController::class,'destory'])->name('chat.delete');


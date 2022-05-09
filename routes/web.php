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

Route::get('/', [PostController::class, 'index'])->name('homepage');
Route::get('/post/{post:slug}', [PostController::class, 'show'])->name('post.show');

Route::get('/post', [PostController::class, 'create'])->name('post.create');
Route::post('/post', [PostController::class, 'store'])->name('post.store');

Route::get('/post/edit/{post:slug}', [PostController::class, 'edit'])->name('post.edit');
Route::post('/post/edit/{post}', [PostController::class, 'update'])->name('post.update');

Route::post('/post/delete/{post}', [PostController::class, 'destroy'])->name('post.destroy');

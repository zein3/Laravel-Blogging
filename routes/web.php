<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SavedPostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


/* Post Route */
Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/post/{post:slug}', [PostController::class, 'show'])->name('post.show');

Route::get('/post', [PostController::class, 'create'])->name('post.create');
Route::post('/post', [PostController::class, 'store'])->name('post.store');

Route::get('/post/edit/{post:slug}', [PostController::class, 'edit'])->name('post.edit');
Route::post('/post/edit/{post}', [PostController::class, 'update'])->name('post.update');

Route::post('/post/delete/{post}', [PostController::class, 'destroy'])->name('post.destroy');


/* Login Route */
Route::get('/login', [LoginController::class, 'show'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->name('login_attempt')->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');



/* Register Route */
Route::get('/register', [RegisterController::class, 'show'])->name('register')->middleware('guest');
Route::post('/register', [UserController::class, 'store'])->name('register_attempt')->middleware('guest');



/* Posts' Likes Route */
Route::post('/like/{post:id}', [LikeController::class, 'store'])->name('like.store')->middleware('auth');
Route::delete('/like/{post:id}', [LikeController::class, 'destroy'])->name('like.destroy')->middleware('auth');



/* Comment Route */
Route::post('/comment', [CommentController::class, 'store'])->name('comment.store')->middleware('auth');
Route::patch('/comment/{comment:id}', [CommentController::class, 'update'])->name('comment.update')->middleware('auth');
Route::delete('/comment/{comment:id}', [CommentController::class, 'destroy'])->name('comment.destroy')->middleware('auth');



/* Saved Post Route */
Route::get('/saved', [SavedPostController::class, 'index'])->name('saved_post.index')->middleware('auth');
Route::post('/saved/{post:id}', [SavedPostController::class, 'store'])->name('saved_post.store')->middleware('auth');
Route::delete('/saved/{post:id}', [SavedPostController::class, 'destroy'])->name('saved_post.destroy')->middleware('auth');



/* Email Verification Route */

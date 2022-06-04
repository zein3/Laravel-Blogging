<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SavedPostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\EmailVerificationController;


/* Post Route */
Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/post/{post:slug}', [PostController::class, 'show'])->name('post.show');

Route::get('/post', [PostController::class, 'create'])->name('post.create')->middleware('auth');
Route::post('/post', [PostController::class, 'store'])->name('post.store')->middleware('auth');

Route::get('/post/edit/{post:slug}', [PostController::class, 'edit'])->name('post.edit')->middleware('auth');
Route::patch('/post/edit/{post:id}', [PostController::class, 'update'])->name('post.update')->middleware('auth');
Route::patch('/post/edit/{post:id}/change_thumbnail', [PostController::class, 'updateThumbnail'])->name('post.update_thumbnail')->middleware('auth');

Route::delete('/post/delete/{post}', [PostController::class, 'destroy'])->name('post.destroy');


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
Route::post('/comment/post/{post:id}', [CommentController::class, 'store'])->name('comment.store')->middleware('auth');
Route::delete('/comment/{comment:id}', [CommentController::class, 'destroy'])->name('comment.destroy')->middleware('auth');



/* Saved Post Route */
Route::get('/saved', [SavedPostController::class, 'index'])->name('saved_post.index')->middleware('auth');
Route::post('/saved/{post:id}', [SavedPostController::class, 'store'])->name('saved_post.store')->middleware('auth');
Route::delete('/saved/{post:id}', [SavedPostController::class, 'destroy'])->name('saved_post.destroy')->middleware('auth');



/* User Route */
Route::get('/user/{user:id}', [UserController::class, 'edit'])->name('user.edit')->middleware('auth');
Route::post('/profile_picture/{user:id}', [UserController::class, 'updateProfilePicture'])->name('user.update.profile.picture')->middleware('auth');
Route::post('/change_password/{user:id}', [UserController::class, 'updatePassword'])->name('user.update.password')->middleware('auth');
Route::patch('/user/{user:id}', [UserController::class, 'update'])->name('user.update')->middleware('auth');
Route::delete('/user/{user:id}', [UserController::class, 'destroy'])->name('user.destroy')->middleware('auth');
Route::delete('/profile_picture/{user:id}', [UserController::class, 'destroyProfilePicture'])->name('user.destroy.profile.picture')->middleware('auth');



/* Email Verification Route */
Route::get('/email/verify', [EmailVerificationController::class, 'notice'])->name('verification.notice')->middleware('auth');
Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])->name('verification.verify')->middleware(['auth', 'signed']);
Route::post('/email/verification-notification', [EmailVerificationController::class, 'send'])->name('verification.send')->middleware('auth');



/* Tags Route */
Route::post('/tags/{post:id}', [TagController::class, 'store'])->name('tag.store')->middleware('auth');
Route::delete('/tags/{post:id}/{tag:id}', [TagController::class, 'destroy'])->name('tag.destroy')->middleware('auth');

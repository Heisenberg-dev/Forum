<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::resource('topics', TopicController::class);
Route::resource('topics.posts', PostController::class)->shallow();
Route::get('/topics', [TopicController::class, 'index']);

<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Mail\TestMail;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Auth\RegisteredUserController;


// WELCOME

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// TOPICS, COMMENTS
Route::middleware('auth')->group(function () {
    Route::post('topics/{topic}/comments', [CommentController::class, 'store'])->name('topics.comments.store');
    Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    Route::get('/topics/{topic}', [TopicController::class, 'show'])->name('topics.show');
});


// CATEGORIES
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories/{category}/topics/create', [TopicController::class, 'create'])->name('topics.create');
Route::post('/categories/{category}/topics', [TopicController::class, 'store'])->name('topics.store');


// PROFILE

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// MAIL

Route::get('/send-test-mail', function () {
    \Mail::to('recipint@example.com')->send(new TestMail());
    return 'Test mail sent!';
});

// AUTHENTICATION

require __DIR__ . '/auth.php';

// HEADER
Route::get('/rules', function () {
    return view('rules');
})->name('rules');

Route::get('/clubs', function () {
    return view('clubs');
})->name('clubs');

Route::get('/hot', function () {
    return view('hot');
})->name('hot');


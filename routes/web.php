<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\PostController;
use App\Mail\TestMail;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::post('topics/{topic}/posts', [PostController::class, 'store'])->name('topics.posts.store');
Route::get('topics', [TopicController::class, 'index'])->name('topics.index');
Route::resource('topics', TopicController::class)->except(['index']);

Route::middleware('auth')->group(function () {
    Route::post('topics/{topic}/posts', [PostController::class, 'store'])->name('topics.posts.store');
});


Route::get('/send-test-mail', function(){
    \Mail::to('recipint@example.com')->send(new TestMail());
    return 'Test mail sent!';
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/rules', function () {
    return view('rules');
})->name('rules');

Route::get('/profile', function () {
    return view('profile');
})->middleware('auth')->name('profile');

Route::get('/clubs', function () {
    return view('clubs');
})->name('clubs');

Route::get('/hot', function () {
    return view('hot');
})->name('hot');


require __DIR__.'/auth.php';

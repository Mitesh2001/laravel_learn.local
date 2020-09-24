<?php

use App\Http\Controllers\TodoController;
use App\Http\Controllers\TodoReourceController;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth')->group(function () {
    Route::resource('/todo', TodoReourceController::class);
// });

Route::put('/todos/{todo}/complete', [\App\Http\Controllers\TodoController::class, 'complete'])->name('todo.complete');
Route::put('/todos/{todo}/incomplete', [\App\Http\Controllers\TodoController::class, 'incomplete'])->name('todo.incomplete');

Route::get('/', function () {
    return view('welcome');
});
Route::post('/upload', [App\Http\Controllers\UserController::class, 'uploadAvatar']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\MoodController;

//redirect ke halaman login kalau belum masuk
Route::get('/', function () {
    return redirect('/login');
});

Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/todos', [TodoController::class, 'index'])->name('todos.index');
    Route::get('/todos/create', [TodoController::class, 'create'])->name('todos.create');
    Route::post('/todos', [TodoController::class, 'store'])->name('todos.store');
    Route::get('/todos/{id}/edit', [TodoController::class, 'edit'])->name('todos.edit');
    Route::put('/todos/{id}', [TodoController::class, 'update'])->name('todos.update');
    Route::delete('/todos/{id}', [TodoController::class, 'destroy'])->name('todos.destroy');

    Route::get('/moods', [MoodController::class, 'index'])->name('moods.index');
    Route::get('/moods/create', [MoodController::class, 'create'])->name('moods.create');
    Route::post('/moods', [MoodController::class, 'store'])->name('moods.store');
    Route::get('/moods/{id}/edit', [MoodController::class, 'edit'])->name('moods.edit');
    Route::put('/moods/{id}', [MoodController::class, 'update'])->name('moods.update');
    Route::delete('/moods/{id}', [MoodController::class, 'destroy'])->name('moods.destroy');
});

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

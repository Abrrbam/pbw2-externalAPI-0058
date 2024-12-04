<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index'])->name('posts.index');

// Halaman Edit
Route::get('/posts/{$id}/edit', [PostController::class, 'edit'])->name('posts.edit');

// Proses edit
Route::put('/posts/{$id}', [PostController::class, 'edit'])->name('posts.update');

// Proses delete
Route::delete('/posts/{$id}', [PostController::class, 'destroy'])->name('posts.destroy');




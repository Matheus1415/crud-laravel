<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::prefix('/users')->group(function () {
    Route::get('/', [UsersController::class, 'index'])->name('users.index');
    Route::get('/create/', [UsersController::class, 'create'])->name('users.create');
    Route::get('/', [UsersController::class, 'store'])->name('users.store');
    Route::get('/{user}/', [UsersController::class, 'show'])->name('users.show');
    Route::get('/{user}/edit/', [UsersController::class, 'edit'])->name('users.edit');
    Route::get('/{user}/', [UsersController::class, 'update'])->name('users.update');
    Route::get('/{user}/', [UsersController::class, 'destroy'])->name('users.destroy');
});

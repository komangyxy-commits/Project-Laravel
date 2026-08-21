<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [UserController::class, 'register'])->middleware('guest')->name('register');
Route::post('/register', [UserController::class, 'store']);
    
Route::get('/login', [UserController::class, 'login'])->middleware('guest')->name('login');
Route::post('/login', [UserController::class, 'authenticate']);

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/todos/index', [TodoController::class, 'index'])->middleware('auth')->name('todos.index');
Route::get('/todos/create', [TodoController::class, 'create'])->middleware('auth')->name('todos.create');
Route::post('/todos', [TodoController::class, 'store'])->middleware('auth')->name('todos.store');
Route::get('/todos/{todo}/edit', [TodoController::class, 'edit'])->middleware('auth')->name('todos.edit');
Route::put('/todos/{todo}', [TodoController::class, 'update'])->middleware('auth')->name('todos.update');
Route::delete('/todos/{todo}', [TodoController::class, 'destroy'])->middleware('auth')->name('todos.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

//GET requests
Route::get('/', [TasksController::class, 'index'])->name('index');
Route::get('/tasks', [TasksController::class, 'index'])->name('index');
Route::get('/tasks/create', [TasksController::class, 'create'])->name('create');

//POST requests
Route::post('/tasks', [TasksController::class, 'store'])->name('store');

//PATCH requests
Route::patch('/tasks/{id}', [TasksController::class, 'update'])->name('update');

//DELETE requests
Route::delete('/tasks/{id}', [TasksController::class, 'delete'])->name('delete');
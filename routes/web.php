<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::prefix('/todo')->group(function(){

    Route::get('/', [TodoController::class, 'index'])->name('todo');
    Route::post('/store', [TodoController::class, 'store'])->name('todo.store');
    Route::get('/{task_id}/delete', [TodoController::class, 'delete'])->name('todo.delete');
    Route::get('/{task_id}/edit', [TodoController::class, 'edit'])->name('todo.edit');
    Route::get('/todo', [TodoController::class, 'index'])->name('todo.index');
    Route::put('/todo/{task}', [TodoController::class, 'update'])->name('todo.update');

});

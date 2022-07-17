<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [TodoController::class, 'index'])->name('home');
Route::post('/todos', [TodoController::class, 'store'])->name('todos');
Route::put('/todos/{todo:id}', [TodoController::class, 'update'])->name('todos.update');
Route::delete('/todos/{todo:id}', [TodoController::class, 'destroy'])->name('todos.delete');
Route::post('/todos/done/{todo:id}', [TodoController::class, 'done'])->name('todos.done');

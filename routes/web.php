<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/todos', [TodosController::class, 'index'])->name('todo.index');

// send user to list of tasks
Route::get('/todos/{todo}', [TodosController::class, 'show'])->name('todo.show');

// send user to create view
Route::get('/new-todos', [TodosController::class, 'create']);

// stores new task
Route::match(['get', 'post'] ,'/store-todo', [TodosController::class, 'store']);

// send user to edit view
Route::get('todos/{todo}/edit', [TodosController::class, 'edit'])->name('todo.edit');

// updates the tas
Route::match(['get', 'post'], 'todos/{todo}/update-todo', [TodosController::class, 'update']);

// deletes the task
Route::match(['get', 'delete'], '/todos/{todo}/delete', [TodosController::class, 'delete'])->name('todo.delete');

Route::get('/todos/{todo}/complete', [TodosController::class, 'complete']);
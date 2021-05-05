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

Route::get('/todos', [TodosController::class, 'index']);

Route::get('/todos/{todo}', [TodosController::class, 'show']);

// send user to create view
Route::get('/new-todos', [TodosController::class, 'create']);

// stores new to-do
Route::match(['get', 'post'] ,'/store-todo', [TodosController::class, 'store']);
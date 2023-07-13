<?php

use App\Http\Controllers\TaskController;
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

Route::get('/', [TaskController::class, 'index'])->name('index');
Route::get('/taskaddpage', [TaskController::class, 'addTaskPage'])->name('task.add.page');
Route::post('/taskadd', [TaskController::class, 'create'])->name('task.add');
Route::get('/task-{id}', [TaskController::class, 'viewTask'])->name('task.view.page');
Route::get('/edit_task-{id}', [TaskController::class, 'edit'])->name('task.edit.page');
Route::patch('/edit_task', [TaskController::class, 'postEdit'])->name('task.edit');
Route::get('/delete_task-{id}', [TaskController::class, 'delete'])->name('task.delete');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

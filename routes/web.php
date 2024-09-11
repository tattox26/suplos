<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => ['auth:web,api']], function () {
    Route::get('/task', [App\Http\Controllers\TaskController::class, 'index'])->name('task');
    Route::post('/tasks', [App\Http\Controllers\TaskController::class, 'store'])->name('store');;
    Route::put('/tasks/{id}', [App\Http\Controllers\TaskController::class, 'update'])->name('update');
    Route::delete('/tasks/{id}', [App\Http\Controllers\TaskController::class, 'destroy'])->name('destroy');
    Route::get('/edit/{task}', [App\Http\Controllers\TaskController::class, 'edit'])->name('task.edit');;
});

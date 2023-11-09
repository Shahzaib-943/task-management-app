<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('create-task',[TaskController::class,'index'])->name('tasks.create');
    Route::post('store-task',[TaskController::class,'store'])->name('tasks.store');
    Route::delete('delete-task/{task}',[TaskController::class,'delete'])->name('tasks.delete');
    Route::get('edit-task/{task}',[TaskController::class,'edit'])->name('tasks.edit');
    Route::post('update-task/{task}',[TaskController::class,'update'])->name('tasks.update');
    Route::post('update-task-status/{task}',[TaskController::class,'updateStatus'])->name('tasks.status.update');

});

Auth::routes();



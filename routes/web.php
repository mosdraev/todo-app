<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Task\TaskController;
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

// Home page route
Route::get('/', [HomeController::class, 'index']);

Route::group(['middleware' => 'auth'], function() {

    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    Route::get('/create', [TaskController::class, 'create'])->name('task');

    Route::post('/store', [TaskController::class, 'store'])->name('store');

    Route::post('/destroy/{id}', [TaskController::class, 'destroy'])->name('destroy');

    Route::post('modify', [TaskController::class, 'modify'])->name('modify');

    Route::get('view/{id}', [TaskController::class, 'view'])->name('view');

    Route::get('update/{id}', [TaskController::class, 'update'])->name('update');

});

require __DIR__.'/auth.php';

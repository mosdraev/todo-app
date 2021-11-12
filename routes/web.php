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

Route::get('/dashboard', [HomeController::class, 'dashboard'])
    ->middleware(['auth'])->name('dashboard');

Route::get('/task', [TaskController::class, 'create'])
    ->middleware(['auth'])->name('task');

Route::post('/store', [TaskController::class, 'store'])
    ->middleware(['auth'])->name('store');

require __DIR__.'/auth.php';

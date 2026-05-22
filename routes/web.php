<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Welcome
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/login');
});

/*
|--------------------------------------------------------------------------
| Dashboard & Tasks
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [TaskController::class, 'index'])
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | USER UPLOAD PDF
    |--------------------------------------------------------------------------
    */

    Route::post('/tasks', [TaskController::class, 'store'])
        ->name('tasks.store');

    /*
    |--------------------------------------------------------------------------
    | ADMIN UPLOAD PDF KE USER
    |--------------------------------------------------------------------------
    */

    Route::post('/admin/tasks', [TaskController::class, 'adminStore'])
        ->name('admin.tasks.store');

    /*
    |--------------------------------------------------------------------------
    | HAPUS TUGAS
    |--------------------------------------------------------------------------
    */

    Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])
        ->name('tasks.destroy');

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';
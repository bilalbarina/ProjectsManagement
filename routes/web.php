<?php

use App\Http\Controllers\ProjectController;
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

Route::controller(ProjectController::class)->as('project.')->group(function() {
    Route::get('/', 'index')->name('index');
    Route::prefix('/project')->group(function() {
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{project}', 'edit')->name('edit');
        Route::post('/{project}', 'update')->name('update');
    });
});


Route::controller(TaskController::class)->as('task.')->group(function() {
    Route::prefix('/task')->group(function() {
        Route::get('{project}/create', 'create')->name('create');
        Route::post('{project}/store', 'store')->name('store');
        Route::get('/{task}', 'edit')->name('edit');
        Route::post('/{task}', 'update')->name('update');
    });
});

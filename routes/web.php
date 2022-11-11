<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\StudentController;
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

Route::controller(PromotionController::class)->group(function () {
    Route::get('/', 'index')->name('promotion.index');

    Route::prefix('/promotion')->group(function () {
        Route::get('/create', 'create')->name('promotion.create');
        Route::post('/store', 'store')->name('promotion.store');

        Route::post('/update/{promotion:token}', 'update')->name('promotion.update');
        Route::get('/delete/{promotion:token}', 'delete')->name('promotion.delete');

        Route::get('/search', 'search')->name('promotion.search');

        Route::get('/{promotion:token}', 'view')->name('promotion.view');
    });
});

Route::controller(StudentController::class)->prefix('/student')->group(function () {
    Route::get('/create/{promotion:token}', 'create')->name('student.create');
    Route::post('/create/{promotion:token}', 'store')->name('student.store');

    Route::get('/edit/{student:token}', 'edit')->name('student.edit');
    Route::post('/update/{student:token}', 'update')->name('student.update');

    Route::get('/delete/{student:token}', 'delete')->name('student.delete');

    Route::get('/search/{promotion:token}', 'search')->name('student.search');
});

Route::controller(ProjectController::class)->as('project.')->group(function() {
    Route::get('/projects', 'index')->name('index');
    Route::prefix('/project')->group(function() {
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/delete/{project:token}', 'destroy')->name('delete');
        Route::get('/search', 'search')->name('search');
        Route::get('/{project:token}', 'view')->name('view');
        Route::post('/{project:token}', 'update')->name('update');
    });
});

Route::controller(AssignmentController::class)->as('assignment.')->group(function() {
    Route::get('/assign/{project:token}', 'index')->name('index');
    Route::get('/assign-student/{project:token}/{student_id}', 'assign')->name('assign');
    Route::get('/unassign-student/{project:token}/{student_id}', 'unassign')->name('unassign');
    Route::get('/assign-all/{project:token}', 'assignToAll')->name('all');
    Route::get('/search-students/{project:token}', 'searchStudents')->name('searchStudents');
});

Route::controller(TaskController::class)->as('task.')->group(function() {
    Route::prefix('/task')->group(function() {
        Route::get('/search/{project:token}', 'search')->name('search');
        Route::get('{project:token}/create', 'create')->name('create');
        Route::post('{project:token}/store', 'store')->name('store');
        Route::get('/{task:token}', 'edit')->name('edit');
        Route::post('/{task:token}', 'update')->name('update');
        Route::get('/delete/{task:token}', 'destroy')->name('delete');
    });
});
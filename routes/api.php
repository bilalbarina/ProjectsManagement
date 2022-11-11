<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PromotionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/promotion/{promotion:token}/update-title', [PromotionController::class, 'updateTitle'])
    ->name('promotion.updateTitle');

Route::post('/project/{project:token}/update-title', [ProjectController::class, 'updateTitle'])
    ->name('project.updateTitle');

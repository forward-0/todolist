<?php

use App\Http\Controllers\statusController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::resource('/tasks', TaskController::class);
Route::patch('/tasks/update/status/{task}', [statusController::class,'status']);
Route::patch('/tasks/update/weight/{taskOne}/{task}', [statusController::class,'swapWeights']);

<?php

use App\Http\Controllers\Api\RepositoryController;
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

Route::get('find', [RepositoryController::class, 'get']);
Route::post('find', [RepositoryController::class, 'fetch']);
Route::delete('find/{id}', [RepositoryController::class, 'delete']);

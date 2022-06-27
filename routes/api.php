<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AlternativeController;
use App\Http\Controllers\ResponseController;

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
Route::get('/cities', [CityController::class, 'index']);

Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);


Route::post('/questions', [QuestionController::class, 'store']);
Route::put('/questions/{id}', [QuestionController::class, 'update']);
Route::delete('/questions/{id}', [QuestionController::class, 'destroy']);
Route::get('/questions', [QuestionController::class, 'index']);
Route::get('/questions/{id}', [QuestionController::class, 'show']);

Route::post('/alternatives', [AlternativeController::class, 'store']);
Route::put('/alternatives/{id}', [AlternativeController::class, 'update']);
Route::delete('/alternatives/{id}', [AlternativeController::class, 'destroy']);
Route::get('/alternatives', [AlternativeController::class, 'index']);
Route::get('/alternatives/{id}', [AlternativeController::class, 'show']);

Route::post('/responses', [ResponseController::class, 'store']);
Route::put('/responses/{id}', [ResponseController::class, 'update']);
Route::delete('/responses/{id}', [ResponseController::class, 'destroy']);
Route::get('/responses', [ResponseController::class, 'index']);
Route::get('/responses/{id}', [ResponseController::class, 'show']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

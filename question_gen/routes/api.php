<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\QuestionTermController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\InstituteController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('admin')->group(function () {
    Route::resource('subject', SubjectController::class);
    Route::post('subject/{id}', [SubjectController::class,'update']);
    Route::resource('institute', InstituteController::class);
    Route::post('institute/{id}', [InstituteController::class,'update']);
    Route::resource('board', BoardController::class);
    Route::post('board/{id}', [BoardController::class,'update']);
    Route::resource('class', ClassController::class);
    Route::post('class/{id}', [ClassController::class,'update']);
    Route::resource('question-term', QuestionTermController::class);
    Route::post('question-term/{id}', [QuestionTermController::class,'update']);
    Route::get('board-year',  [BoardController::class,'boardYearAll']);
    Route::post('board-year', [BoardController::class,'boardYearCreate']);
    Route::post('board-year/{id}', [BoardController::class,'boardYearUpdate']);
    Route::get('board-year/{id}', [BoardController::class,'boardYearShow']);
    Route::delete('board-year/{id}', [BoardController::class,'boardYearDelete']);
    Route::get('status',  [BoardController::class,'statusAll']);
    Route::post('status', [BoardController::class,'statusCreate']);
    Route::get('status/{id}', [BoardController::class,'statusShow']);
    Route::post('status/{id}', [BoardController::class,'statusUpdate']);
    Route::delete('status/{id}', [BoardController::class,'statusDelete']);

});
Route::prefix('teacher')->group(function () {});
Route::prefix('student')->group(function () {});

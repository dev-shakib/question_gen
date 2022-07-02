<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\QuestionTermController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\GenerateQuestionController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Teacher\TeacherAuthController;
use App\Http\Controllers\Student\StudentAuthController;
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
    Route::middleware(['auth:admin-api', 'role:admin'])->group(function () {
        // Subject
        Route::resource('subject', SubjectController::class);
        Route::post('subject/{id}', [SubjectController::class,'update']);
        // Subject
        // Institute
        Route::resource('institute', InstituteController::class);
        Route::post('institute/{id}', [InstituteController::class,'update']);
        // Institute
        // Board
        Route::resource('board', BoardController::class);
        Route::post('board/{id}', [BoardController::class,'update']);
        // Board
        // Class
        Route::resource('class', ClassController::class);
        Route::post('class/{id}', [ClassController::class,'update']);
        // Class
        // Question Terms
        Route::resource('question-term', QuestionTermController::class);
        Route::post('question-term/{id}', [QuestionTermController::class,'update']);
        // Question Terms
        // Role Route
        Route::resource('role', RoleController::class);
        Route::post('role/{id}', [RoleController::class,'update']);
        Route::get('roles/assign-permission/{roleid}', [RoleController::class,'assignPermission']);
        // Role Route
        // Permission Route
        Route::resource('permission', PermissionController::class);
        Route::post('permission/{id}', [PermissionController::class,'update']);
        // Permission Route
        // Board Year
        Route::get('question-year',  [BoardController::class,'questionYearAll']);
        Route::post('question-year', [BoardController::class,'questionYearCreate']);
        Route::post('question-year/{id}', [BoardController::class,'questionYearUpdate']);
        Route::get('question-year/{id}', [BoardController::class,'questionYearShow']);
        Route::delete('question-year/{id}', [BoardController::class,'questionYearDelete']);
        // Board Year
        // Status
        Route::get('status',  [BoardController::class,'statusAll']);
        Route::post('status', [BoardController::class,'statusCreate']);
        Route::get('status/{id}', [BoardController::class,'statusShow']);
        Route::post('status/{id}', [BoardController::class,'statusUpdate']);
        Route::delete('status/{id}', [BoardController::class,'statusDelete']);
        // Status
    });
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
});
Route::prefix('teacher')->group(function () {

    Route::post('register', [TeacherAuthController::class, 'register']);
    Route::post('login', [TeacherAuthController::class, 'login']);
    Route::middleware(['auth:teacher-api', 'role:teacher'])->group(function () {
        Route::post('update-user-info',[TeacherAuthController::class, 'updateUserInfo']);
        Route::resource('question',QuestionController::class);
        Route::post('question/{id}',[QuestionController::class, 'update']);
        Route::resource('generate-question',GenerateQuestionController::class);
        Route::post('generate-question/{id}',[GenerateQuestionController::class, 'update']);
    });
});
Route::prefix('student')->group(function () {

    Route::middleware(['auth:student-api', 'role:student'])->group(function () {

    });
    Route::post('register', [StudentAuthController::class, 'register']);
    Route::post('login', [StudentAuthController::class, 'login']);
});

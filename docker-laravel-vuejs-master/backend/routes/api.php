<?php

use App\Http\Controllers\RecruiterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VacancyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/user_register',[UserController::class, 'register'])->name('users.register');
Route::post('/recruiter_register',[RecruiterController ::class, 'registerRecruiter'])->name('recruiters.register');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::middleware('auth:sanctum')->post('/vacancy_register',[VacancyController::class, 'registerVacancy'] );
//Route::post('/vacancy_register', [VacancyController::class, 'registerVacancy'])->name('vacancies.register');
Route::get('/vacancies',[VacancyController::class,'vacancies'])->name('vacancies');
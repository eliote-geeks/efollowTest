<?php

use App\Http\Controllers\NiveauController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SmartCardController;
use App\Http\Controllers\SpecialiteController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Models\Niveau;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('carte/ajout/{student}', [SmartCardController::class, 'addGetStudentCard'])->name('addGetStudentCard');
Route::post('carte/ajout/{student}', [SmartCardController::class, 'addPostStudentCard'])->name('addPostStudentCard');
Route::get('carte/search/{student}', [SmartCardController::class, 'searchByStudentCard'])->name('searchByStudentCard');


Route::resource('specialté', SpecialiteController::class);
Route::resource('niveau', NiveauController::class);
Route::resource('etudiant', StudentController::class);
Route::resource('session',SessionController::class);
Route::resource('enseignant', TeacherController::class);
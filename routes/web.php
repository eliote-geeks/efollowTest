<?php

use App\Models\Niveau;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SesionController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SmartCardController;
use App\Http\Controllers\SpecialiteController;

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
    return redirect()->route('login');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('carte/ajout/{student}', [SmartCardController::class, 'createStudentCard'])->name('addGetStudentCard');
Route::post('carte/ajout/{student}', [SmartCardController::class, 'addPostStudentCard'])->name('addPostStudentCard');
Route::get('carte/search/{student}', [SmartCardController::class, 'searchByStudentCard'])->name('searchByStudentCard');
route::post('carte/shedule/{program}',[SmartCardController::class,'scheduleCard'])->name('scheduleCard');
route::post('carte/etudiant/{course}',[SmartCardController::class,'addStudentCourseCard'])->name('addStudentCourseCard');
route::get('carte/etudiant/{program}',[SmartCardController::class,'endListCardschedule'])->name('endListCardschedule');
route::get('carte/register/{course}',[SmartCardController::class,'registerSTudentCourse'])->name('registerSTudentCourse');
Route::get('schedule/card/{program}',[SmartCardController::class,'schedule'])->name('schedule');


Route::get('/levels/{speciality}', [StudentController::class, 'getLevelsBySpeciality']);
Route::get('program/course/{course}',[ProgramController::class,'programCourse'])->name('programCourse');
Route::get('program/presence/{program}',[ProgramController::class,'presenceStudent'])->name('presence.student');
Route::get('program/absence/{program}',[ProgramController::class,'absenceStudent'])->name('absence.student');




Route::resource('specialté', SpecialiteController::class);
Route::resource('niveau', NiveauController::class);
Route::resource('etudiant', StudentController::class);
Route::resource('session',SesionController::class);
Route::resource('enseignant', TeacherController::class);
Route::resource('cours',CourseController::class);
Route::resource('program', ProgramController::class);
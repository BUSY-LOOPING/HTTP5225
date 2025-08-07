<?php

use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');


Route::get(
    'students/trash/{id}',
    [StudentController::class, 'trash']
)->name('students.trash');
Route::get(
    'students/trashed/',
    [StudentController::class, 'trashed']
)->name('students.trashed');
Route::get(
    'students/restore/{id}',
    [StudentController::class, 'trash']
)->name('students.restore');
Route::resource('students', StudentController::class);

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

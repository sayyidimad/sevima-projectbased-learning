<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome', ['menu' => 'home']);
})->name('home');

Route::controller(TeacherController::class)->prefix('teachers')->name('teacher.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{teacher}', 'show')->name('show');
    Route::get('/{teacher}/edit', 'edit')->name('edit');
    Route::post('/{teacher}/update', 'update')->name('update');
    Route::delete('/{teacher}/delete', 'destroy')->name('delete');
});

Route::controller(StudentController::class)->prefix('students')->name('student.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{student}', 'show')->name('show');
    Route::get('/{student}/edit', 'edit')->name('edit');
    Route::post('/{student}/update', 'update')->name('update');
    Route::delete('/{student}/delete', 'destroy')->name('delete');
});

Route::controller(CourseController::class)->prefix('courses')->name('course.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{course}', 'show')->name('show');
    Route::get('/{course}/edit', 'edit')->name('edit');
    Route::post('/{course}/update', 'update')->name('update');
    Route::delete('/{course}/delete', 'destroy')->name('delete');
});

Route::controller(EventController::class)->prefix('events/{course}')->name('event.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{event}', 'show')->name('show');
    Route::get('/{event}/edit', 'edit')->name('edit');
    Route::post('/{event}/update', 'update')->name('update');
    Route::delete('/{event}/delete', 'destroy')->name('delete');
});

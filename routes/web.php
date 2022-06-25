<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\CourseController;
use App\Http\Controllers\Dashboard\EventController;
use App\Http\Controllers\Dashboard\StudentController as StudentBack;
use App\Http\Controllers\StudentController as StudentFront;
use App\Http\Controllers\Dashboard\TeacherController;

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

Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::get('/home', function () {
        return view('welcome', ['menu' => 'home']);
    })->middleware('auth')->name('home');

    Route::controller(TeacherController::class)->prefix('teachers')->name('teacher.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{teacher}', 'show')->name('show');
        Route::get('/{teacher}/edit', 'edit')->name('edit');
        Route::post('/{teacher}/update', 'update')->name('update');
        Route::delete('/{teacher}/delete', 'destroy')->name('delete');
    });

    Route::controller(StudentBack::class)->prefix('students')->name('student.')->group(function () {
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

    Route::controller(EventController::class)->prefix('courses/{course}/events')->name('event.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{event}', 'show')->name('show');
        Route::get('/{event}/edit', 'edit')->name('edit');
        Route::post('/{event}/update', 'update')->name('update');
        Route::delete('/{event}/delete', 'destroy')->name('delete');
    });
});

Route::controller(StudentFront::class)->prefix('students/')->name('student.')->group(function () {
    Route::get('/', 'course')->name('course');
    Route::get('/{course}', 'event')->name('event');
    Route::get('/{event}/single', 'single')->name('single');
    // Route::get('/{event}/edit', 'edit')->name('edit');
    // Route::post('/{event}/update', 'update')->name('update');
    // Route::delete('/{event}/delete', 'destroy')->name('delete');
});

Route::get('/register', [AuthController::class, 'register'])->middleware(['guest'])->name('register');
Route::get('/login', [AuthController::class, 'loginForm'])->middleware(['guest'])->name('login.form');
Route::post('/register/store', [AuthController::class, 'registerStore'])->middleware(['guest'])->name('register.store');
Route::post('/login', [AuthController::class, 'login'])->middleware(['guest'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->middleware(['auth'])->name('logout');

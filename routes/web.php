<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MenteeController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\MTypeController;
use App\Http\Controllers\ProfileController;
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

/* //Dashboard Default Laravel Route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Home Route
Route::get('/home', function () {
    return view('home');
})->middleware('auth')->name('home');

//Admin 
//Mentor Routes
Route::resource('mentors', MentorController::class)->names('admin.mentors')->middleware('auth', 'can:admin.mentors');
//Mentee Routes
Route::resource('mentees', MenteeController::class)->names('admin.mentees')->middleware('auth', 'can:admin.mentees');

//Mentor


//Mentee



//Calendar/Event Route
Route::get('events/list', [EventController::class, 'listEvent'])->name('events.list');
Route::resource('events', EventController::class)->middleware('auth');

//MTypes Route
Route::resource('mtypes', MTypeController::class)->only(['index'])->middleware('auth');

require __DIR__.'/auth.php';

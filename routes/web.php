<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\Admin\QuizController;
Route::controller(QuizController::class)->prefix('admin')->name('admin.')->group(function() {
    Route::get('quiz/create', 'add')->name('quiz.add')->middleware('auth');
    Route::post('quiz/create','create')->name('quiz.create')->middleware('auth');
    Route::get('quiz', 'index')->name('quiz.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\Admin\QuizController::class, 'index']);

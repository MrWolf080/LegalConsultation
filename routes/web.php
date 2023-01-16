<?php

use App\Http\Controllers\AskQuestionConstroller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\LawyerController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('/', 'IndexController@index')->name('index');
Route::post('/auth', [AuthController::class, 'auth'])->name('auth');
Route::middleware('is_client')->group(function () {
    Route::get('/client', [ClientController::class, 'client'])->name('main_client_page');
    Route::get('/client_question', [AskQuestionConstroller::class, 'question'])->name('ask_question');
    Route::post('/client_question', [AskQuestionConstroller::class, 'asking_question'])
        ->name('asking_question');
    Route::post('/solve_problem/{id}', [ClientController::class, 'solve_problem'])->name('solve_problem')
        ->middleware('messages');

});
Route::middleware('is_lawyer')->group(function () {
    Route::get('/lawyer', [LawyerController::class, 'lawyer'])->name('main_lawyer_page');
    Route::post('/lawyer/filter',[LawyerController::class, 'filter'])->name('filter_applications');
});

Route::middleware('messages')->group(function () {
    Route::get('/messages/{id}', [MessagesController::class, 'show'])->name('messages');
    Route::post('/messages/{id}', [MessagesController::class, 'send_message'])->name('send_message');
});

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');


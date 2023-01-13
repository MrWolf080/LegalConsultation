<?php

use App\Http\Controllers\AskQuestionConstroller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
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

Route::get('/', 'AuthFormController@index')->name('authorization');
Route::post('/auth', [AuthController::class, 'auth'])->name('auth');
Route::middleware('is_client')->group(function () {
    Route::get('/client', [ClientController::class, 'client'])->name('main_client_page');
    Route::get('/question', [AskQuestionConstroller::class, 'question'])->name('ask_question');
    Route::post('/question', [AskQuestionConstroller::class, 'asking_question'])->name('asking_question');
});
Route::middleware('is_lawyer')->group(function () {
    Route::get('/lawyer', function (){return view('lawyer');})->name('main_lawyer_page');
    // other routes that need authentication
});
Route::get('/phpinfo', function(){return phpinfo();})->name('logout');
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');


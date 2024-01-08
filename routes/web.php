<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BallotController;

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

Route::get('/home', [BallotController::class, 'index'])->prefix('njangi')->name('home');
Route::get('/choose-ballot', [BallotController::class, 'user'])->prefix('njangi')->name('ballot');
Route::get('/create', [BallotController::class, 'create'])->prefix('njangi')->name('create');
Route::get('/register/{id}', [BallotController::class, 'register'])->prefix('njangi')->name('register');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BingoController;

Route::get('//', [BingoController::class, 'draw']);
Route::get('/bingo/draw-number', [BingoController::class, 'drawNumber']);


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

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardsController;
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
//
//
Route::get('/', [CardsController::class,'index'])->name('main');
Route::resource('cards', CardsController::class);



//Route::get('/', [CardsController::class,'index'])->name('main');
//
//
//Route::get('/cards/create', [CardsController::class,'create']);
//Route:get('/cards/delete/{id}',[CardsController::class,'delete'])
//
//Route::put('/cards/store',[CardsController::class,'store'])->name('cards.store');
//

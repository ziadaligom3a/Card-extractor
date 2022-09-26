<?php

use App\Http\Controllers\Card;
use App\Http\Controllers\Done;
use App\Http\Controllers\CardCrop;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;

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
    return view('CARD');
});
Route::get('/crop', function () {
    return view('CROP');
});

Route::post('card', [Card::class, 'Card']);
Route::post('crop', [CardCrop::class, 'CROP'])->name('crop');


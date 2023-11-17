<?php

use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Route;
use App\Models\Content;
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

Route::controller(BaseController::class)->group(function () {
    Route::get('/{slug?}', 'home')->name('home');
    Route::get('/content/{slug}', 'content')->name('content');
});

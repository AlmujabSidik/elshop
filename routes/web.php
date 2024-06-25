<?php

use App\Http\Controllers\OrderController;
use App\Livewire\Order;
use App\Livewire\Verifikasi;
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
//
Route::get('/', Order::class);
Route::get('/verifikasi', [OrderController::class, 'index']);

<?php

use Illuminate\Support\Facades\Route;
use App\Models\Dropoff;
use App\Http\Controllers\DropoffController;
use App\Http\Controllers\RewardController;

// Route::get('/', function () {
//     $dropoffs = Dropoff::latest()->get();

//     return view('dashboard', [
//         'dropoffs' => $dropoffs,
//         'title' => 'Dashboard',
//     ]);
// });

Route::get('/', [DropoffController::class, 'dashboard']);

Route::get('/verify-dropoff', [DropoffController::class, 'index'])
    ->name('dropoffs.index');

Route::post('/verify-dropoff', [DropoffController::class, 'store'])
    ->name('dropoffs.store');



Route::get('/rewards', [RewardController::class, 'index'])
    ->name('rewards.index');

Route::post('/rewards', [RewardController::class, 'redeem'])
    ->name('rewards.redeem');
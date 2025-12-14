<?php

use App\Models\Dropoff;
use App\Http\Controllers\DropoffController;
use App\Http\Controllers\RewardController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        'dropoffs' => \App\Models\Dropoff::latest()->get(),
    ]);
})->middleware('auth')->name('dashboard');
require __DIR__.'/auth.php';


Route::get('/verify-dropoff', [DropoffController::class, 'index'])
    ->name('dropoffs.index');

Route::post('/verify-dropoff', [DropoffController::class, 'store'])
    ->name('dropoffs.store');



Route::get('/rewards', [RewardController::class, 'index'])
    ->name('rewards.index');

Route::post('/rewards', [RewardController::class, 'redeem'])
    ->name('rewards.redeem');
    

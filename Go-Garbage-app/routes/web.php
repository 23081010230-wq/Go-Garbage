<?php

use App\Models\Dropoff;
use App\Http\Controllers\DropoffController;
use App\Http\Controllers\RewardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeaderboardController;




Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    $user = Auth::user();

    $verifiedDropoffs = $user->dropoffs()
        ->where('status', 'Verified');

    return view('dashboard', [
        // Show ALL dropoffs in the list
        'dropoffs' => $user->dropoffs()->latest()->get(),

        // Stats ONLY from verified
        'totalPoints'   => $user->points ?? 0,
        'dropoffsCount' => $verifiedDropoffs->count(),
        'totalWeight'   => $verifiedDropoffs->sum('weight'),
        'rank'          => '#12',
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
    
Route::get('/leaderboard', [LeaderboardController::class, 'index'])
    ->middleware('auth')
    ->name('leaderboard');

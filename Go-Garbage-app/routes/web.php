<?php

use Illuminate\Support\Facades\Route;
use App\Models\Dropoff;

Route::get('/', function () {
    $dropoffs = Dropoff::latest()->get();

    return view('dashboard', [
        'dropoffs' => $dropoffs,
        'title' => 'Dashboard',
    ]);
});

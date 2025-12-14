<?php

namespace App\Http\Controllers;

use App\Models\User;

class LeaderboardController extends Controller
{
    public function index()
    {
        $users = User::with(['dropoffs' => function ($query) {
                $query->where('status', 'Verified');
            }])
            ->get()
            ->map(function ($user) {
                return [
                    'name' => $user->name,
                    'points' => $user->points ?? 0,
                    'dropoffs_count' => $user->dropoffs->count(),
                    'total_weight' => $user->dropoffs->sum('weight'),
                ];
            })
            ->sortByDesc('weight')
            ->values();

        return view('leaderboard', compact('users'));
    }
}

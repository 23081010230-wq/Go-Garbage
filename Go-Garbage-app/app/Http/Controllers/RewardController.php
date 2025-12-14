<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RewardController extends Controller
{
    public function index()
    {
        // USER DUMMY
        $user = User::first();

        if (!$user) {
            abort(404, 'User belum ada. Tambahkan user dulu untuk UI test.');
        }

        // 🔹 sementara kosong dulu (UI test)
        $redemptions = collect();

        return view('rewards.index', compact('user', 'redemptions'));
    }

    public function redeem(Request $request)
    {
        return back()->with('success', 'UI test: redeem berhasil (belum disimpan)');
    }
}

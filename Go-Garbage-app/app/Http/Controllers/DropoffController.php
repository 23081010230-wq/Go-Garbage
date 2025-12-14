<?php

namespace App\Http\Controllers;

use App\Models\Dropoff;
use Illuminate\Http\Request;

class DropoffController extends Controller
{
    // Dashboard: hanya verified
    public function dashboard()
    {
        $dropoffs = Dropoff::where('status', 'verified')
            ->latest()
            ->take(6)
            ->get();

        return view('dashboard', compact('dropoffs'));
    }

    // Halaman Verify Drop-off
    public function index()
    {
        $dropoffs = Dropoff::latest()->get();
        return view('dropoffs.index', compact('dropoffs'));
    }

    // Simpan pengajuan drop-off
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'weight' => 'required',
            'location' => 'required',
            'image' => 'required|image',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images/dropoffs'), $imageName);

        Dropoff::create([
            'title' => $request->title,
            'weight' => $request->weight,
            'location' => $request->location,
            'image' => $imageName,
            'status' => 'pending',
        ]);

        return redirect()->back()
            ->with('success', 'Drop-off berhasil diajukan dan menunggu verifikasi');
    }
}

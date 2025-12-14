@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded shadow">

    <h2 class="text-2xl font-semibold mb-4">
        Detail Drop-off
    </h2>

    <img
        src="{{ asset('images/dashboard/' . $dropoff->image) }}"
        class="w-full h-64 object-cover rounded mb-4"
    />

    <div class="space-y-2">
        <p><strong>Jenis Sampah:</strong> {{ $dropoff->title }}</p>
        <p><strong>Berat:</strong> {{ $dropoff->weight }} kg</p>
        <p><strong>Lokasi:</strong> {{ $dropoff->location }}</p>

        <p>
            <strong>Status:</strong>
            @if($dropoff->status === 'verified')
                <span class="text-green-600 font-semibold">
                    ✔ Verified (+{{ $dropoff->points }} poin)
                </span>
            @else
                <span class="text-yellow-600 font-semibold">
                    Pending
                </span>
            @endif
        </p>
    </div>

    @if($dropoff->status === 'pending')
        <form
            action="{{ route('dropoffs.verify', $dropoff->id) }}"
            method="POST"
            class="mt-6"
        >
            @csrf
            <button
                class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded"
            >
                Ajukan Verifikasi
            </button>
        </form>
    @endif

    <a href="/" class="inline-block mt-4 text-gray-600 underline">
        ← Kembali ke Dashboard
    </a>

</div>

@endsection

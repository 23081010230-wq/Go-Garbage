@extends('layouts.app')

@section('content')

{{-- HEADER --}}
<div class="px-10 mt-8">
    <h1 class="text-2xl font-bold text-gray-800">
        Verify Drop-off
    </h1>
    <p class="text-gray-500 mt-1">
        Ajukan sampah Anda dan pantau status verifikasinya
    </p>
</div>

{{-- SUCCESS MESSAGE --}}
@if(session('success'))
<div class="mx-10 mt-6 bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded">
    {{ session('success') }}
</div>
@endif

{{-- FORM DROP-OFF --}}
<div class="mx-10 mt-6 bg-white p-6 rounded-lg shadow">
    <h3 class="text-lg font-semibold mb-4">
        Ajukan Drop-off Sampah
    </h3>

    <form action="{{ route('dropoffs.store') }}" method="POST" enctype="multipart/form-data"
          class="grid grid-cols-2 gap-4">
        @csrf

        <div>
            <label class="text-sm text-gray-600">Jenis Sampah</label>
            <input name="title"
                   class="w-full border rounded px-3 py-2 mt-1 focus:ring focus:ring-green-200"
                   placeholder="Plastik, Kertas, dll">
        </div>

        <div>
            <label class="text-sm text-gray-600">Berat (kg)</label>
            <input name="weight"
                   class="w-full border rounded px-3 py-2 mt-1"
                   placeholder="Contoh: 2.5">
        </div>

        <div class="col-span-2">
            <label class="text-sm text-gray-600">Lokasi Drop-off</label>
            <input name="location"
                   class="w-full border rounded px-3 py-2 mt-1"
                   placeholder="TPS Jubung / Bank Sampah A">
        </div>

        <div class="col-span-2">
            <label class="text-sm text-gray-600">Foto Sampah</label>
            <input type="file" name="image"
                   class="w-full border rounded px-3 py-2 mt-1">
        </div>

        <div class="col-span-2 flex justify-end">
            <button
                class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded">
                Ajukan Drop-off
            </button>
        </div>
    </form>
</div>

{{-- RIWAYAT DROP-OFF --}}
<div class="mx-10 mt-10">
    <h3 class="text-xl font-semibold mb-4">
        Riwayat Drop-off
    </h3>

    @if($dropoffs->count() === 0)
        <div class="bg-gray-50 border border-gray-200 p-6 rounded text-center text-gray-500">
            Belum ada riwayat drop-off
        </div>
    @else
        <div class="grid grid-cols-3 gap-6">
            @foreach($dropoffs as $dropoff)
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <img
                    src="{{ asset('images/dropoffs/'.$dropoff->image) }}"
                    class="h-36 w-full object-cover">

                <div class="p-4">
                    <p class="font-semibold text-gray-800">
                        {{ $dropoff->title }}
                    </p>

                    <p class="text-sm text-gray-500">
                        {{ $dropoff->weight }} kg
                    </p>

                    <span class="inline-block mt-2 px-3 py-1 text-xs rounded-full
                        {{ $dropoff->status === 'verified'
                            ? 'bg-green-100 text-green-700'
                            : 'bg-yellow-100 text-yellow-700' }}">
                        {{ ucfirst($dropoff->status) }}
                    </span>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>

@endsection

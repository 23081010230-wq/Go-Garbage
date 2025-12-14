@extends('layouts.app')

@section('content')

<!-- Hero -->
<div class="relative h-64 bg-cover bg-center"
     style="background-image: url('{{ asset('Images/Dashboard/sampah-1.jpeg') }}');">
    <div class="absolute inset-0 bg-black/40"></div>
    <div class="relative z-10 h-full flex flex-col justify-center px-10 text-white">
        <h2 class="text-4xl font-bold">Drop Off Garbage, Earn Cash</h2>
        <p class="mt-2 max-w-xl">
            Bring your garbage to our collection centers, verify your drop-off,
            and redeem points for cash or coupons.
        </p>
    </div>
</div>

<!-- Stats -->
<div class="grid grid-cols-4 gap-6 px-10 mt-8">
    @foreach([
        ['title' => 'Total Points', 'value' => '1,250', 'sub' => '+120 this week'],
        ['title' => 'Drop-offs', 'value' => '42', 'sub' => 'Verified'],
        ['title' => 'Rank', 'value' => '#12', 'sub' => 'In your region'],
        ['title' => 'Total Weight', 'value' => '84kg', 'sub' => 'Garbage dropped'],
    ] as $stat)
        <div class="bg-white p-5 rounded shadow">
            <p class="text-sm text-gray-500">{{ $stat['title'] }}</p>
            <p class="text-2xl font-bold">{{ $stat['value'] }}</p>
            <p class="text-sm text-green-600">{{ $stat['sub'] }}</p>
        </div>
    @endforeach
</div>

<!-- Recent Drop-offs -->
<div class="px-10 mt-10">
    <h3 class="text-xl font-semibold mb-4">Recent Drop-offs</h3>

    <div class="grid grid-cols-3 gap-6">
        @foreach($dropoffs as $dropoff)
            <div class="bg-white rounded shadow overflow-hidden">
                <img
                    class="h-40 w-full object-cover"
                    src="{{ asset('Images/Dashboard/' . $dropoff->image) }}"
                    alt="{{ $dropoff->title }}"
                />
                <div class="p-4">
                    <h4 class="font-semibold">{{ $dropoff->title }}</h4>
                    <p class="text-sm text-gray-500">
                        {{ $dropoff->weight }} — {{ $dropoff->status }}
                    </p>
                    <button class="mt-3 bg-green-600 text-white px-4 py-1 rounded">
                        View
                    </button>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection


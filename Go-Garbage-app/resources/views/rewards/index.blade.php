@extends('layouts.app')

@section('content')
<div class="p-10 max-w-6xl mx-auto">

    {{-- Alert --}}
    @if(session('success'))
        <div class="mb-6 bg-green-100 text-green-700 px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 bg-red-100 text-red-700 px-4 py-2 rounded">
            {{ session('error') }}
        </div>
    @endif

    {{-- Header --}}
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Rewards</h1>
        <p class="text-gray-500">Tukar poinmu menjadi hadiah atau saldo tunai</p>
    </div>

    {{-- Info User --}}
    @php
        $points = $user->points ?? 0;
        $target = 500;
        $percent = min(100, ($points / $target) * 100);
    @endphp

    <div class="bg-white rounded-xl shadow p-6 mb-10 flex justify-between items-center">
        <div>
            <p class="text-sm text-gray-500">Nama Pelanggan</p>
            <p class="text-lg font-semibold">{{ $user->name }}</p>
        </div>

        <div class="text-right w-64">
            <p class="text-sm text-gray-500">Total Poin</p>
            <p class="text-3xl font-bold text-green-600">
                {{ $points }}
            </p>

            {{-- Progress Bar --}}
            <div class="mt-3">
                <div class="w-full bg-gray-200 rounded-full h-3">
                    <div class="bg-green-600 h-3 rounded-full"
                         style="width: {{ $percent }}%"></div>
                </div>
                <p class="text-xs text-gray-500 mt-1">
                    {{ $points }} / {{ $target }} poin
                </p>
            </div>
        </div>
    </div>

    {{-- Form Redeem --}}
    <div class="bg-white rounded-xl shadow p-6 mb-12">
        <h3 class="text-lg font-semibold mb-6">Tukar Poin</h3>

        <form method="POST" action="{{ route('rewards.redeem') }}"
              class="grid grid-cols-2 gap-4"
              id="redeemForm">
            @csrf

            <div class="col-span-2">
                <select name="type" id="rewardType"
                        class="w-full border rounded p-2">
                    <option value="">Pilih Jenis Reward</option>
                    <option value="voucher">Voucher Belanja</option>
                    <option value="transfer">Transfer ke Rekening</option>
                </select>
            </div>

            {{-- Preset --}}
            <div class="col-span-2 flex gap-3">
                <button type="button"
                        class="preset-btn bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded text-sm"
                        data-points="100">
                    100 poin = Voucher 10k
                </button>

                <button type="button"
                        class="preset-btn bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded text-sm"
                        data-points="500">
                    500 poin = Saldo 50k
                </button>
            </div>

            <div class="col-span-2">
                <input type="number" name="points" id="pointsInput"
                       placeholder="Jumlah Poin"
                       class="w-full border rounded p-2">
            </div>

            {{-- Bank Fields --}}
            <div id="bankFields" class="col-span-2 grid grid-cols-2 gap-4 hidden">
                <input type="text" name="bank_name"
                       placeholder="Nama Bank"
                       class="w-full border rounded p-2">

                <input type="text" name="account_number"
                       placeholder="Nomor Rekening"
                       class="w-full border rounded p-2">
            </div>

            <div class="col-span-2">
                <button class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded w-full">
                    Ajukan Penukaran
                </button>
            </div>
        </form>
    </div>

    {{-- Riwayat --}}
    <h3 class="text-lg font-semibold mb-4">Riwayat Penukaran</h3>

    <div class="grid grid-cols-3 gap-6">
        @forelse($redemptions as $item)
            <div class="bg-white p-4 rounded-xl shadow">
                <p class="font-semibold mb-1">{{ ucfirst($item->type) }}</p>
                <p class="text-sm text-gray-500">Poin: {{ $item->points }}</p>

                <div class="mt-3">
                    @if($item->status === 'approved')
                        <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full">
                            Approved
                        </span>
                    @elseif($item->status === 'rejected')
                        <span class="bg-red-100 text-red-700 text-xs px-3 py-1 rounded-full">
                            Rejected
                        </span>
                    @else
                        <span class="bg-yellow-100 text-yellow-700 text-xs px-3 py-1 rounded-full">
                            Pending
                        </span>
                    @endif
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center text-gray-500">
                Belum ada riwayat penukaran poin
            </div>
        @endforelse
    </div>

</div>

{{-- JS --}}
<script>
    const rewardType = document.getElementById('rewardType');
    const bankFields = document.getElementById('bankFields');
    const pointsInput = document.getElementById('pointsInput');

    rewardType.addEventListener('change', function () {
        if (this.value === 'transfer') {
            bankFields.classList.remove('hidden');
        } else {
            bankFields.classList.add('hidden');
        }
    });

    document.querySelectorAll('.preset-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            pointsInput.value = btn.dataset.points;
        });
    });
</script>
@endsection

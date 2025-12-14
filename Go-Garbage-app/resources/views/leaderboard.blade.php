@extends('layouts.app')

@section('content')
<div class="px-10 py-8">
    <h2 class="text-2xl font-bold mb-6">Leaderboard</h2>

    <div class="bg-white rounded shadow overflow-hidden">
        <table class="w-full table-fixed">
            <thead class="bg-gray-100 text-sm uppercase text-gray-600">
            <tr>
                <th class="w-16 p-4 text-left">Rank</th>
                <th class="w-1/4 p-4 text-left pl-8">User</th>
                <th class="w-1/6 p-4 text-center">Points</th>
                <th class="w-1/6 p-4 text-center">Drop-offs</th>
                <th class="w-1/6 p-4 text-center">Total Weight</th>
            </tr>
            </thead>

            <tbody class="divide-y">
                @foreach($users as $index => $user)
                    <tr class="border-t">
                        <td class="p-4 font-bold text-gray-700">
                            #{{ $index + 1 }}
                        </td>

                        <td class="p-4 pl-8 font-medium text-gray-900">
                            {{ $user['name'] }}
                        </td>

                        <td class="p-4 text-center">
                            <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold
                                {{ $user['points'] > 0 ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">
                                {{ $user['points'] }}
                            </span>
                        </td>

                        <td class="p-4 text-center">
                            {{ $user['dropoffs_count'] }}
                        </td>

                        <td class="p-4 text-center">
                            {{ $user['total_weight'] }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

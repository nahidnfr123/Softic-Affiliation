<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <div class="flex justify-between">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                {{ __('Transactions') }}
                            </h2>

                            @if(auth()->guard('web')->check())
                                <a href="{{ route('transaction.create') }}">
                                    <x-primary-button class="ml-3">Create Transaction</x-primary-button>
                                </a>
                            @endif
                        </div>
                    </div>

                    <table class="table-fixed w-full">
                        <thead>
                        <tr class="bg-gray-100">
                            <th class="border px-4 py-2">Amount</th>
                            <th class="border px-4 py-2">Details</th>
                            <th class="border px-4 py-2">Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transactions as $transaction)
                            <tr>
                                <td class="border px-4 py-2">Tk. {{$transaction->amount}}</td>
                                <td class="border px-4 py-2">{{$transaction->details}}</td>
                                <td class="border px-4 py-2">{{\Carbon\Carbon::parse($transaction->created_at)}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

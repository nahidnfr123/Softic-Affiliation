<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <div class="flex justify-between">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                {{$user->name}}, {{ __('Transactions') }}
                            </h2>
                        </div>
                    </div>

                    <table class="table-fixed w-full">
                        <thead>
                        <tr class="bg-gray-100">
                            <th class="border px-4 py-2">Transaction Amount</th>
                            <th class="border px-4 py-2">Details</th>
                            <th class="border px-4 py-2">Affiliates</th>
                            <th class="border px-4 py-2">Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user->transactions as $transaction)
                            <tr>
                                <td class="border px-4 py-2">Tk. {{$transaction->amount}}</td>
                                <td class="border px-4 py-2">{{$transaction->details}}</td>
                                <td class="border px-4 py-2">
                                    @if($transaction->commissions)
                                        @foreach($transaction->commissions as $commission)
                                            <div>Tk. {{$commission->amount}}</div>
                                            <div>({{$commission->through_user_id ? 'Affiliate' : 'Sub-Affiliate'}})</div>
{{--                                            <div>{{$commission->affiliate_user}}</div>--}}
                                            <hr>
                                        @endforeach
                                    @endif
                                </td>
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

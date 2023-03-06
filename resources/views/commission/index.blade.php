<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <div class="flex justify-between">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                {{ __('Commissions') }}
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
                            <th class="border px-4 py-2">Commission Amount</th>
                            <th class="border px-4 py-2">User</th>
                            @if(!auth()->user()->type == 'sub-affiliate')
                                <th class="border px-4 py-2">Sub-Affiliate</th>
                            @endif
                            <th class="border px-4 py-2">Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($commissions as $commission)
                            <tr>
                                <td class="border px-4 py-2">Tk. {{$commission->amount}}</td>
                                <td class="border px-4 py-2">{{$commission->transaction->user->name}} (Tk. {{$commission->transaction->amount}})</td>
                                @if(!auth()->user()->type == 'sub-affiliate')
                                    <td class="border px-4 py-2">
                                        {{--                                    {{$commission->throughUser->name}}--}}
                                    </td>
                                @endif
                                <td class="border px-4 py-2">{{\Carbon\Carbon::parse($commission->created_at)}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

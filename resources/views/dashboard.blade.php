<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(auth()->guard('admin')->check())
                        <a href="{{ route('users.index') }}" class="bg-red-400 rounded-lg p-2 px-4 text-white mr-2">
                            View Users
                        </a>
                        <a href="{{ route('affiliate.index') }}" class="bg-blue-400 rounded-lg p-2 px-4 text-white mr-2">
                            View Affiliate Users
                        </a>
                        <a href="{{ route('affiliate.create') }}" class="bg-blue-800 rounded-lg p-2 px-4 text-white mr-2">
                            Create Affiliate User
                        </a>
                    @endif

                    @if (auth()->guard('affiliate')->check())
                        <a href="{{ route('commission.index') }}" class="bg-green-600 rounded-lg p-2 px-4 text-white mr-2">
                            View Commissions
                        </a>
                        <a href="{{ route('affiliate.create') }}" class="bg-blue-800 rounded-lg p-2 px-4 text-white mr-2">
                            Create Sub–Affiliate User
                        </a>
                    @endif



                    @if(auth()->guard('web')->check())
                        <a href="{{ route('transaction.index') }}" class="bg-purple-400 rounded-lg p-2 px-4 text-white mr-2">
                            View Transaction
                        </a>
                        <a href="{{ route('transaction.create') }}" class="bg-purple-600 rounded-lg p-2 px-4 text-white mr-2">
                            Create Transaction
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

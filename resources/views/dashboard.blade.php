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
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(auth()->guard('admin')->check() || auth()->guard('affiliate')->check())
                        <a href="{{ route('affiliate.index') }}">
                            <x-primary-button class="ml-3 bg-blue-400">View Affiliate User</x-primary-button>
                        </a>
                    @endif

                    @if(auth()->guard('admin')->check())
                        <a href="{{ route('affiliate.create') }}">
                            <x-primary-button class="ml-3">Create Affiliate User</x-primary-button>
                        </a>
                    @elseif (auth()->guard('affiliate')->check())
                        <a href="{{ route('affiliate.create') }}">
                            <x-primary-button class="ml-3">Create Sub–Affiliate User</x-primary-button>
                        </a>
                    @endif

                    @if(auth()->guard('web')->check())
                        <a href="{{ route('transaction.create') }}">
                            <x-primary-button class="ml-3">Create Transaction</x-primary-button>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

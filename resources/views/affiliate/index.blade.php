<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <div class="flex justify-between">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                {{ __('Affiliate User List') }}
                            </h2>

                            @if(auth()->guard('admin')->check())
                                <a href="{{ route('affiliate.create') }}">
                                    <x-primary-button class="ml-3">Create Affiliate User</x-primary-button>
                                </a>
                            @elseif (auth()->guard('affiliate')->check())
                                <a href="{{ route('affiliate.create') }}">
                                    <x-primary-button class="ml-3">Create Sub–Affiliate User</x-primary-button>
                                </a>
                            @endif
                        </div>
                    </div>

                    <table class="table-fixed w-full">
                        <thead>
                        <tr class="bg-gray-100">
                            <th class="border px-4 py-2">Name</th>
                            <th class="border px-4 py-2">Email</th>
                            <th class="border px-4 py-2">User Type</th>
                            <th class="border px-4 py-2">Promo Code</th>
                            <th class="border px-4 py-2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($affiliateUsers as $affiliateUser)
                            <tr>
                                <td class="border px-4 py-2">{{$affiliateUser->name}}</td>
                                <td class="border px-4 py-2">{{$affiliateUser->email}}</td>
                                <td class="border px-4 py-2">{{$affiliateUser->user_type}}</td>
                                <td class="border px-4 py-2">{{$affiliateUser->promo_code}}</td>
                                <td class="border px-4 py-2">

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

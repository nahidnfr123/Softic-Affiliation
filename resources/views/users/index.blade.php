<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <div class="flex justify-between">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                {{ __('User List') }}
                            </h2>
                        </div>
                    </div>

                    <table class="table-fixed w-full">
                        <thead>
                        <tr class="bg-gray-100">
                            <th class="border px-4 py-2">Name</th>
                            <th class="border px-4 py-2">Email</th>
                            <th class="border px-4 py-2">Transactions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="border px-4 py-2">{{$user->name}}</td>
                                <td class="border px-4 py-2">{{$user->email}}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{route('users.show', $user->id)}}" class="bg-blue-200 rounded p-2 px-4">
                                        {{$user->transactions_count}}  Transactions
                                    </a>
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

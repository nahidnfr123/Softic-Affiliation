<x-app-layout>
    <div class="max-w-3xl mx-auto p-4 my-4 bg-white">
        <h3 class="text-2xl">Create Transaction</h3>
        <hr class="my-2">
        <form method="POST" action="{{ route('transaction.store') }}">
            @csrf
            <div>
                <x-input-label for="amount" :value="__('amount')"/>
                <x-text-input id="amount" class="block mt-1 w-full" type="text" name="amount" :value="old('amount')" required autofocus autocomplete="amount"/>
                <x-input-error :messages="$errors->get('amount')" class="mt-2"/>
            </div>

            <div class="mt-4">
                <x-input-label for="details" :value="__('Details')"/>
                <x-text-area id="details" class="block mt-1 w-full" name="details" required autocomplete="details">
                    {{old('details')}}
                </x-text-area>
                <x-input-error :messages="$errors->get('details')" class="mt-2"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Submit') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>

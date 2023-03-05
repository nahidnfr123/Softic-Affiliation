<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')"/>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')"/>

            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="current-password"/>

            <x-input-error :messages="$errors->get('password')" class="mt-2"/>
        </div>
        <div class="block mt-4">
            <div class="mr-2">Who are you?</div>
            <label class="inline-flex items-center gap-2">
                <input type="radio" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="user_type" value="web">
                <span class="mr-4 mt-0.5 text-sm text-gray-600">{{ __('User') }}</span>
            </label>
            <label class="inline-flex items-center gap-2">
                <input type="radio" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="user_type" value="affiliate">
                <span class="mr-4 mt-0.5 text-sm text-gray-600">{{ __('Affiliate') }}</span>
            </label>
            <label class="inline-flex items-center gap-2">
                <input type="radio" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="user_type" value="admin">
                <span class="mr-4 mt-0.5 text-sm text-gray-600">{{ __('Admin') }}</span>
            </label>
            <x-input-error :messages="$errors->get('user_type')" class="mt-2"/>
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>
        <div class="flex items-center justify-space-between mt-4">
            @if (Route::has('register'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                    {{ __('Register') }}
                </a>
            @endif
            <div class="flex-1 flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="ml-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </div>
    </form>
</x-guest-layout>

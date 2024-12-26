<x-guest-layout>
    <!-- Session Status -->
    <x-auth.auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="max-w-sm m-auto flex flex-col gap-5 shadow-md px-8 py-6">
        @csrf
        <div class="flex flex-col gap-2 items-center">
            <i class="fa-solid fa-lock text-3xl p-4 rounded-full bg-gray-200 block"></i>
            <h1 class="text-2xl font-bold text-center">Login</h1>
        </div>

        <!-- Email Address -->
        <div>
            <x-auth.input-label for="email" :value="__('Email')" />
            <x-auth.text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-auth.input-error :messages="$errors->get('email')" />
        </div>

        <!-- Password -->
        <div>
            <x-auth.input-label for="password" :value="__('Password')" />

            <x-auth.text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-auth.input-error :messages="$errors->get('password')" />
        </div>

        <!-- Remember Me -->
        <div class="block">
            <label for="remember_me" class="inline-flex items-center gap-2">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-40 0 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-auth.primary-button>
                {{ __('Log in') }}
            </x-auth.primary-button>
        </div>
        <hr />
        <div class="text-center">
            Don't have an Account?.
            <a class="underline text-gray-600 dark:text-gray-40 0 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('register') }}">
                {{ __('Register here.') }}
            </a>
        </div>
    </form>
</x-guest-layout>

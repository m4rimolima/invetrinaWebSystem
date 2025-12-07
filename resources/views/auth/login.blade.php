<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-300 px-4">
        <div class="w-full max-w-md bg-white/90 backdrop-blur shadow-xl rounded-2xl p-8 border border-gray-200">

            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
                {{ __('Acessar sua conta') }}
            </h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-semibold" />
                    <x-text-input
                        id="email"
                        class="block mt-1 w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required autofocus autocomplete="username"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Senha')" class="text-gray-700 font-semibold" />

                    <x-text-input
                        id="password"
                        class="block mt-1 w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                        type="password"
                        name="password"
                        required autocomplete="current-password"
                    />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center mb-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input
                            id="remember_me"
                            type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            name="remember"
                        >
                        <span class="ms-2 text-sm text-gray-600">{{ __('Lembrar de mim') }}</span>
                    </label>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between">

                    @if (Route::has('password.request'))
                        <a
                            class="underline text-sm text-gray-600 hover:text-gray-900 focus:outline-none"
                            href="{{ route('password.request') }}"
                        >
                            {{ __('Esqueceu a senha?') }}
                        </a>
                    @endif

                    <x-primary-button class="ml-3 px-6 py-2 rounded-xl">
                        {{ __('Entrar') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>

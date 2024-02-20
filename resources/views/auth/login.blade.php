<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
        
            <div class="relative">
                <x-text-input id="password" class="block mt-1 w-full pr-10"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
        
                <button type="button" class="absolute inset-y-0 right-0 px-4 py-1" onclick="togglePasswordVisibility()">
                    <i id="eyeOpen" class="fas fa-eye"></i>
                    <i id="eyeClosed" class="fas fa-eye-slash" style="display: none;"></i>
                </button>
            </div>
        
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        
        <style>
            .relative {
                display: flex;
            }
        
            .absolute {
                position: absolute;
                right: 0;
                top: 50%;
                transform: translateY(-50%);
            }
        </style>
        
        <script>
            function togglePasswordVisibility() {
                var passwordInput = document.getElementById('password');
                var toggleIconOpen = document.getElementById('eyeOpen');
                var toggleIconClosed = document.getElementById('eyeClosed');
                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    toggleIconOpen.style.display = 'none';
                    toggleIconClosed.style.display = 'inline-block';
                } else {
                    passwordInput.type = "password";
                    toggleIconOpen.style.display = 'inline-block';
                    toggleIconClosed.style.display = 'none';
                }
            }
        </script>
        
        
        

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Ingat Saya') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Lupa password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Masuk') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

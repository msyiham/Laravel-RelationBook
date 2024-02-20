<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <!-- resources/views/auth/register.blade.php -->

        <div class="form-group">
            <x-input-label for="role" :value="__('Pilih Kelas')" />
            <select id="class_id" name="class_id" class="block mt-1 w-full">
                @foreach($class as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Daftar Sebagai')" />
            <select id="role" class="block mt-1 w-full" name="role" :value="old('role')" required autofocus autocomplete="role">
                <option value="teacher">Guru</option>
                <option value="student">Siswa</option>
            </select>
        </div>
        
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <div class="relative">
                <x-text-input class="block mt-1 w-full pr-10"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <button type="button" class="absolute inset-y-0 right-0 px-4 py-1" onclick="togglePasswordVisibility(this)">
                    <i class="fas fa-eye" data-target="password"></i>
                    <i class="fas fa-eye-slash" data-target="password" style="display: none;"></i>
                </button>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <div class="relative">
                <x-text-input class="block mt-1 w-full pr-10"
                                type="password"
                                name="password_confirmation"
                                required autocomplete="new-password" />

                <button type="button" class="absolute inset-y-0 right-0 px-4 py-1" onclick="togglePasswordVisibility(this)">
                    <i class="fas fa-eye" data-target="password_confirmation"></i>
                    <i class="fas fa-eye-slash" data-target="password_confirmation" style="display: none;"></i>
                </button>
            </div>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
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
            function togglePasswordVisibility(button) {
                var passwordInput = button.previousElementSibling;
                var toggleIconOpen = button.querySelector('.fa-eye');
                var toggleIconClosed = button.querySelector('.fa-eye-slash');
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




        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Sudah punya akun?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Daftar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

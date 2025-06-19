<x-guest-layout>
    <style>
        body {
            background-color: #e8f5e9;
            font-family: 'Poppins', sans-serif;
        }

        .register-card {
            background: #fff;
            max-width: 480px;
            margin: 40px auto;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
        }

        .register-header {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .register-header h2 {
            color: #2e7d32;
            font-weight: 600;
        }

        .register-header .emoji {
            font-size: 40px;
        }

        .btn-green {
            background-color: #2e7d32;
            color: white;
            padding: 10px 18px;
            border-radius: 6px;
            transition: 0.3s;
        }

        .btn-green:hover {
            background-color: #1b5e20;
        }

        a {
            color: #388e3c;
        }

        a:hover {
            color: #1b5e20;
        }
    </style>

    <div class="register-card">
        <div class="register-header">
            <div class="emoji">⛺</div>
            <h2>Daftar ke RentNGo</h2>
            <p class="text-muted">Ayo bergabung dan mulai sewa alat camping!</p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <x-input-label for="name" :value="__('Nama Lengkap')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                    :value="old('name')" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="mb-3">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                    :value="old('email')" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-3">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full"
                    type="password" name="password" required />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                    type="password" name="password_confirmation" required />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between mt-4">
                <a class="text-sm underline" href="{{ route('login') }}">
                    {{ __('Sudah punya akun? Login') }}
                </a>

                <button type="submit" class="btn-green">
                    {{ __('Daftar') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>

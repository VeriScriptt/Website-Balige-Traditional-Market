<x-guest-layout>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <form method="POST" action="{{ route('register') }}" class="min-h-screen bg-gradient-to-r from-indigo-500 to-purple-600 flex items-center justify-center px-4 sm:px-6 lg:px-8">
        @csrf
        <div class="max-w-md w-full space-y-4 p-6 bg-white shadow-md rounded-lg" style="max-width:30rem;">
            <h2 class="text-3xl font-extrabold text-center text-gray-900">{{ __('Daftar') }}</h2>
            <p class="text-sm text-center text-gray-600">{{ __('Daftarkan Akun Anda') }}</p>

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="('Nama')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Phone Number -->
            <div class="mt-4">
                <x-input-label for="nomor_telepon" :value="('Nomor Telepon')" />
                <x-text-input id="nomor_telepon" class="block mt-1 w-full" type="tel" name="nomor_telepon"
                    :value="old('nomor_telepon')" placeholder="62xxxxxxxxxx" pattern="[0-9]*" inputmode="numeric"
                    required />
                <x-input-error :messages="$errors->get('nomor_telepon')" class="mt-2" />
                <p class="text-gray-600 text-sm mt-1">Format nomor telepon harus dimulai dengan 62 dan hanya berisi
                    angka.</p>
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="('Sandi')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" :value="('Konfirmasi Sandi')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Register Button -->
            <div>
                <x-primary-button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('Daftar') }}
                </x-primary-button>
            </div>

            <div class="mt-4 flex justify-between">
                <a class="font-medium text-indigo-600 hover:text-indigo-300" href="{{ route('login') }}">
                    {{ __('Sudah memiliki akun?') }}
                </a>

                <a class="font-medium text-indigo-600 hover:text-indigo-300" href="{{ route('register_penjual') }}">
                    {{ __('Daftar sebagai penjual') }}
                </a>
            </div>


        </div>
    </form>

        <!-- Tambahkan JavaScript -->
        <script>
            document.getElementById('nomor_telepon').addEventListener('input', function (e) {
                let value = e.target.value;
                value = value.replace(/[^0-9]/g, ''); // Hanya menerima angka
                if (!value.startsWith('62')) {
                    value = '62' + value.replace(/^0+/, ''); // Hilangkan 0 di awal jika ada
                }
                e.target.value = value;
            });
    
        </script>
</x-guest-layout>
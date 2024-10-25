<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- NIM -->
        <div>
            <x-input-label for="nim" :value="__('NIM')" />
            <x-text-input id="nim"
                class="block mt-1 w-full appearance-none [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                type="number" name="nim" :value="old('name')" required autofocus autocomplete="nim" inputmode="numeric"
                min="0" />
            <x-input-error :messages="$errors->get('nim')" class="mt-2" />
        </div>

        <!-- Nama -->
        <div class="mt-4">
            <x-input-label for="name" :value="__('Nama')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div x-data="registerForm()">
            <!-- Fakultas -->
            <div class="mt-4">
                <x-input-label for="fakultas" :value="__('Fakultas')" />
                <select name="fakultas" id="fakultas" x-model="selectedFakultas"
                    class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
                    <option value="" hidden>-- Pilih Fakultas --</option>
                    <template x-for="f in fakultas" :key="f.id">
                        <option :value="f.id" x-text="f.nama_fakultas"></option>
                    </template>
                </select>
            </div>

            <!-- Jurusan -->
            <div class="mt-4">
                <x-input-label for="jurusan" :value="__('Jurusan')" />
                <select name="jurusan" id="jurusan" x-model="selectedJurusan"
                    class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    :disabled="selectedFakultas === ''" required>
                    <template x-if="selectedFakultas === ''">
                        <option value="" hidden>-- Pilih Fakultas dahulu --</option>
                    </template>
                    <template x-if="this.selectedFakultas !== ''">
                        <option value="" hidden>-- Pilih Jurusan --</option>
                    </template>
                    <template x-for="j in filteredJurusan" :key="j.id">
                        <option :value="j.id" x-text="j.nama_jurusan"></option>
                    </template>
                </select>
            </div>
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Sudah terdaftar?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

<script>
    function registerForm() {
        return {
            fakultas: @json($data), // Data fakultas beserta jurusannya dari controller
            selectedFakultas: '',       // Fakultas yang dipilih
            selectedJurusan: '',        // Jurusan yang dipilih

            // Filter jurusan berdasarkan fakultas yang dipilih
            get filteredJurusan() {
                if (this.selectedFakultas === '') {
                    return [];
                }

                // Cari fakultas yang dipilih dan ambil jurusannya
                let selectedFakultas = this.fakultas.find(f => f.id == this.selectedFakultas);
                return selectedFakultas ? selectedFakultas.jurusan : [];
            }
        }
    }
</script>
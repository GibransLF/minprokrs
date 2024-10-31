<x-app-layout>
    <x-slot name="header">
        <div class="flex itens-center">
            <h2 class="font-normal text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Akademik /') }}
            </h2>
            &nbsp;
            <a href="{{route('mahasiswa')}}">
                <h2 class="font-normal text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Mahasiswa /') }}
                </h2>
            </a>
            &nbsp;
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{$mhs->user->name}}
            </h2>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if(session('success'))
            <x-toast type="success" :messages="[session('success')]" />
            @elseif($errors->any())
            <x-toast type="error" :messages="session('errors')->all()" />
            @elseif(session('error'))
            <x-toast type="error" :messages="[session('error')]" />
            @endif

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Update Mahasiswa') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Memperbaharui data mahasiswa.') }}
                            </p>
                        </header>

                        <form method="post" action="{{ route('mahasiswa.update', $mhs->id) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')
                            <div>
                                <x-input-label for="name" :value="__('Nama')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                    value="{{ $mhs->user->name }}" placeholder="{{ $mhs->user->name }}" required />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="nim" :value="__('NIM')" />
                                <x-text-input id="nim" name="nim" type="number" inputmode="numeric" min="0"
                                    class="appearance-none [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none mt-1 block w-full"
                                    value="{{ $mhs->nim }}" placeholder="{{ $mhs->nim }}" required />
                                <x-input-error :messages="$errors->get('nim')" class="mt-2" />
                            </div>
                            <div x-data="selectForm()">
                                <!-- Fakultas -->
                                <div class="mt-4">
                                    <x-input-label for="fakultas" :value="__('Fakultas')" />
                                    <select name="fakultas" id="fakultas" x-model="selectedFakultas"
                                        class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required>
                                        <option value="{{$mhs->Fakultas->id}}" hidden>{{$mhs->Fakultas->nama_fakultas}}
                                        </option>
                                        <template x-for="f in fakultas" :key="f.id">
                                            <option :value="f.id" x-text="f.nama_fakultas"></option>
                                        </template>
                                    </select>

                                    <!-- Jurusan -->
                                    <div class="mt-4">
                                        <x-input-label for="jurusan" :value="__('Jurusan')" />
                                        <select name="jurusan" id="jurusan" x-model="selectedJurusan"
                                            class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            :disabled="selectedFakultas === ''" required>
                                            <template x-for="j in filteredJurusan" :key="j.id">
                                                <option :value="j.id" x-text="j.nama_jurusan"></option>
                                            </template>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                    :value="$mhs->user->email" :placeholder="$mhs->user->email" required
                                    autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            {{-- change password --}}
                            <div class="mt-4">
                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                    href="{{ route('mahasiswa.changePass', $mhs->id) }}">
                                    {{ __('Ubah password?') }}
                                </a>
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>

                                @if (session('status') === 'success')
                                <p x-data="{ show: true }" x-show="show" x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('selectForm', () => ({
            fakultas: @json($dataSelect), // Data fakultas beserta jurusannya dari controller
            selectedFakultas: '{{$mhs->fakultas_id}}',       // Fakultas yang dipilih
            selectedJurusan: '{{$mhs->jurusan_id}}',        // Jurusan yang dipilih

            // Filter jurusan berdasarkan fakultas yang dipilih
            get filteredJurusan() {
                if (this.selectedFakultas === '') {
                    return [];
                }

                // Cari fakultas yang dipilih dan ambil jurusannya
                let selectedFakultas = this.fakultas.find(f => f.id == this.selectedFakultas);
                return selectedFakultas ? selectedFakultas.jurusan : [];
            },
        }));
    });

</script>
<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-normal text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Akademik /') }}
            </h2>
            &nbsp;
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Kartu Rencana Studi') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
            <x-toast type="success" :messages="[session('success')]" />
            @elseif($errors->any())
            <x-toast type="error" :messages="session('errors')->all()" />
            @elseif(session('error'))
            <x-toast type="error" :messages="[session('error')]" />
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between">
                        <p class="text-4xl font-semibold text-gray-900 dark:text-white">Kartu Rencana Studi</p>
                        <button data-modal-target="add-modal" data-modal-toggle="add-modal" type="button"
                            class="flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-4 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            <span class="mr-2">Tambah</span>
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 12h14m-7 7V5" />
                            </svg>
                        </button>
                    </div>
                    {{-- @include('mahasiswa.add') --}}
                    <table id="search-table">
                        <thead>
                            <tr>
                                <th>
                                    <span class="flex items-center">
                                        No
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Semester
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Mata Kuliah
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Dosen
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Waktu
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        SKS
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Action
                                    </span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($data as $admin) --}}

                            <tr>
                                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    1</td>
                                <td>Genap 2024</td>
                                <td>Sistem Informasi</td>
                                <td>Drs. Dokter Handers.TFT</td>
                                <td>13:00 - 14:30</td>
                                <td>3</td>
                                <td>
                                    <button data-modal-target="edit-modal#" data-modal-toggle="edit-modal#"
                                        type="button"
                                        class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:focus:ring-yellow-900">
                                        Ubah
                                    </button>
                                    {{-- @include('mahasiswa.edit') --}}
                                    &nbsp;
                                    <button data-modal-target="delete-modal#" data-modal-toggle="delete-modal#"
                                        type="button"
                                        class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hapus</button>
                                    {{-- @include('mahasiswa.delete') --}}
                                </td>
                            </tr>

                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
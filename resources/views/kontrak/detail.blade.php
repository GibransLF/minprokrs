<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-normal text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Akademik /') }}
            </h2>
            &nbsp;
            <a href="{{route('kontrak')}}">
                <h2 class="font-normal text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Kontrak KRS /') }}
                </h2>
            </a>
            &nbsp;
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $riwayatPembayaran->mahasiswa->user->name .' - '.
                ucfirst($riwayatPembayaran->semester->nama_semester . ' ' . $riwayatPembayaran->semester->tahun_ajaran)
                }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between">
                        <p class="text-4xl font-semibold text-gray-900 dark:text-white">Kartu Rencana Studi</p>
                        <button data-modal-target="add-modal" data-modal-toggle="add-modal" type="button"
                            class="flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-4 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            <span class="mr-2">Print</span>
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M8 3a2 2 0 0 0-2 2v3h12V5a2 2 0 0 0-2-2H8Zm-3 7a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h1v-4a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v4h1a2 2 0 0 0 2-2v-5a2 2 0 0 0-2-2H5Zm4 11a1 1 0 0 1-1-1v-4h8v4a1 1 0 0 1-1 1H9Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                    {{-- @include('mahasiswa.print') --}}
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $kontrakKrs)

                            <tr>
                                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$loop->iteration}}</td>
                                <td>{{ $kontrakKrs->krs->matkul->kode_mk . ' - ' . $kontrakKrs->krs->matkul->nama_mk }}
                                </td>
                                <td>{{ $kontrakKrs->krs->dosen->nidn . ' - ' . $kontrakKrs->krs->dosen->nama_dosen }}
                                </td>
                                <td>{{ $kontrakKrs->krs->mulai . ' - ' . $kontrakKrs->krs->selesai }}</td>
                                <td>{{ $kontrakKrs->krs->matkul->sks }}</td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
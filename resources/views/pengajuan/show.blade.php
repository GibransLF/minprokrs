<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <a href="{{ route('pengajuan') }}">
                <h2 class="font-normal text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Pengajuan /') }}
                </h2>
            </a>
            &nbsp;
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ ucfirst($semester->nama_semester) . ' ' . $semester->tahun_ajaran }}
            </h2>
        </div>
    </x-slot>

    <div class="pt-12 -b-1">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 justify-center">
                    <div class="flex flex-col justify-between p-4 leading-normal w-full">
                        <header>
                            <div class="flex justify-end items-center">
                                <span
                                    class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                    {{ ucfirst("Dibuka") }}
                                </span>
                            </div>
                        </header>
                        <hr class="h-px bg-gray-400 border-0 dark:bg-gray-700 mb-2">
                        <p class="text-gray-900 dark:text-gray-900 font-bold">Semester
                            {{ ucfirst($semester->nama_semester) . ' ' . $semester->tahun_ajaran
                            }}</p>
                        <span
                            class="flex justify-end text-sm font-bold tracking-tight text-gray-900 dark:text-white">Dibuka
                            sampai {{ date('d-m-Y', strtotime($semester->mulai_kontrak)) }} - {{ date('d-m-Y',
                            strtotime($semester->tutup_kontrak)) }}</span>
                        <footer class="mt-1">
                            <hr class="h-px bg-gray-400 border-0 dark:bg-gray-700">
                            <div class="flex justify-between">
                                <div>
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Total Pembayaran
                                    </span>
                                    <span
                                        class="text-sm text-gray-600 dark:text-gray-400 font-bold">Rp.{{number_format($semester->nominal_pembayaran,
                                        2, ',', '.') }}</span>
                                </div>
                            </div>
                        </footer>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="p-1">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-center">
                        <p class="text-4xl font-semibold text-gray-900 dark:text-white">KRS Tersedia</p>
                    </div>
                    <div class="p-6 text-gray-900 dark:text-gray-100 justify-center">
                        <div class="flex flex-col justify-between p-4 leading-normal w-full">

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
                                    @foreach ($data as $krs)

                                    <tr>
                                        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{$loop->iteration}}</td>
                                        <td>{{ $krs->matkul->kode_mk . ' - ' . $krs->matkul->nama_mk }}</td>
                                        <td>{{ $krs->dosen->nidn . ' - ' . $krs->dosen->nama_dosen }}</td>
                                        <td>{{ $krs->mulai . ' - ' . $krs->selesai }}</td>
                                        <td>{{ $krs->matkul->sks }}</td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <footer class="mt-1">
                            <hr class="h-px bg-gray-400 border-0 dark:bg-gray-700">
                            <div class="flex justify-between items-center font-bold text-lg">
                                <span class="text-gray-700 dark:text-gray-400 text-green-500">Total Pembayaran</span>
                                <span
                                    class="text-gray-700 dark:text-gray-400 text-green-500">Rp.{{number_format($semester->nominal_pembayaran,
                                    2, ',', '.') }}</span>
                            </div>
                        </footer>
                        <div class="flex justify-around mt-8">
                            <!-- kembali -->
                            <form action="{{route('pengajuan.store', $semester->id)}}" method="post"
                                enctype="multipart/form-data" class="">
                                @csrf
                                <div class="mb-4">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        for="gambar">
                                        Upload file Bukti Pembayaran
                                    </label>
                                    <div class="flex items-center space-x-2">
                                        <div class="flex-grow">
                                            <input
                                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                                aria-describedby="file_input_help" id="gambar" name="gambar"
                                                type="file">
                                        </div>
                                        <button type="submit"
                                            class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                            <svg class="w-5 h-5 mr-2 text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M4 15v2a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-2m-8 1V4m0 12-4-4m4 4 4-4" />
                                            </svg>
                                            Upload
                                        </button>
                                    </div>
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">
                                        jpeg, JPG, atau PNG (MAX. 2MB).
                                    </p>
                                </div>
                                <x-input-error :messages="$errors->get('gambar')" class="mt-2" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
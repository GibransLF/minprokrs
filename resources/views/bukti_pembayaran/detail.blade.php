<x-app-layout>
    <x-slot name="header">
        <div class="flex itens-center">
            <h2 class="font-normal text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Pengajuan KRS /') }}
            </h2>
            &nbsp;
            <h2 class="font-normal text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Bukti Pembayaran /') }}
            </h2>
            &nbsp;
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Detail') }}
            </h2>
        </div>
    </x-slot>

    <div class="pt-12 -b-1">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 ">
            @if(session('success'))
            <x-toast type="success" :messages="[session('success')]" />
            @elseif(session('errors'))
            <x-toast type="error" :messages="session('errors')->all()" />
            @endif
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 justify-center">
                    <div class="flex flex-col justify-between p-4 leading-normal w-full">
                        <header>
                            <div class="flex justify-between items-center">
                                <span
                                    class="text-base font-bold tracking-tight text-gray-900 dark:text-white">kode</span>
                                {{-- @if ($transaksi -> status_rental == 'completed')
                                <span
                                    class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Selesai</span>
                                @elseif ($transaksi -> status_rental == 'canceled')
                                <span
                                    class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Dibatalkan</span>
                                @elseif ($transaksi -> status_rental == 'progress')
                                <span
                                    class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">Dirental</span>
                                @else

                                @endif --}}
                            </div>
                            <hr class="h-px bg-gray-400 border-0 dark:bg-gray-700 mb-2">
                        </header>

                        <footer class="mt-1">
                            <p class="text-gray-900 dark:text-gray-900 font-bold">Admin: nama admin</p>
                            <p class="text-gray-900 dark:text-gray-900 font-bold">Nama Mahasiswa: nama mahasiswa
                            </p>
                            <span
                                class="flex justify-end text-sm font-bold tracking-tight text-gray-900 dark:text-white">tgl
                                penerimaan</span>
                            <hr class="h-px bg-gray-400 border-0 dark:bg-gray-700 mb-2">
                        </footer>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="p-1">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-center">
                    <img class="h-auto max-w-full" src="{{asset('img/logoSTMIK.png')}}" alt="image description">
                </div>

            </div>
        </div>
    </div>

    <div class="p-1">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
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
                                </tr>

                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                        <footer class="mt-1">
                            <hr class="h-px bg-gray-400 border-0 dark:bg-gray-700">
                            <div class="flex justify-between items-center font-bold text-lg">
                                <span class="text-gray-700 dark:text-gray-400 text-green-500">Total Pembayaran</span>
                                <span
                                    class="text-gray-700 dark:text-gray-400 text-green-500">Rp.{{number_format('2500000',
                                    2, ',', '.') }}</span>
                            </div>
                        </footer>
                        {{-- @if ($transaksi->status_rental == 'progress') --}}
                        @role('admin')
                        <div class="flex justify-around mt-8">
                            <!-- canceled -->
                            <form action="{{route('dashboard')}}" method="post">
                                @csrf
                                @method('PATCH')
                                <button data-modal-target="canceled-modal" data-modal-toggle="canceled-modal"
                                    type="button"
                                    class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Tolak
                                    Pembayaran</button>

                                <div id="canceled-modal" tabindex="-1"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button"
                                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="canceled-modal">
                                                <svg class="w-3 h-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="p-4 md:p-5 text-center">
                                                <h5 class="my-5 text-base font-normal text-gray-500 dark:text-gray-400">
                                                    Jika barang yang dikembalikan terjadi <span
                                                        class="font-bold">Kerusakan</span> atau <span
                                                        class="font-bold">Hilang,</span> <a
                                                        href="{{route('dashboard')}}"
                                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Klik
                                                        disini.</a></h5>
                                                <svg class="mx-auto mb-4 text-gray-400 w-24 h-24 dark:text-gray-200"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M9 10V6a3 3 0 0 1 3-3v0a3 3 0 0 1 3 3v4m3-2 .917 11.923A1 1 0 0 1 17.92 21H6.08a1 1 0 0 1-.997-1.077L6 8h12Z" />
                                                </svg>
                                                <div>
                                                    <label for="denda"
                                                        class="block mb-2 text-sm font-medium text-red-700 dark:text-red-500 float-left">Catatan</label>
                                                    <input name="denda" type="number" id="denda"
                                                        class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500"
                                                        placeholder="0" min="0">
                                                    <p class="my-2 text-xs text-red-600 dark:text-red-500 float-left">
                                                        Denda <span class="font-medium">jika barang terlambat atau
                                                            kerusakan yang masih tolerir.</span></p>
                                                </div>
                                                <h3 class="my-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                    Apakah anda yakin ingin konfirmasi Transaksi ini?</h3>
                                                <button data-modal-hide="canceled-modal" type="submit"
                                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                    Ya, saya yakin.
                                                </button>
                                                <button data-modal-hide="canceled-modal" type="button"
                                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Tidak,
                                                    batalkan.</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- confirm -->
                            <form action="{{route('dashboard')}}" method="get">
                                @csrf
                                <button data-modal-target="confirm-modal" data-modal-toggle="confirm-modal"
                                    type="button"
                                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Konfirmasi
                                    Pembayaran</button>

                                <div id="confirm-modal" tabindex="-1"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button"
                                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="confirm-modal">
                                                <svg class="w-3 h-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="p-4 md:p-5 text-center">
                                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                    Apakah anda yakin ingin membatalkan Transaksi ini?</h3>
                                                <button data-modal-hide="confirm-modal" type="submit"
                                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                    Ya, saya yakin.
                                                </button>
                                                <button data-modal-hide="confirm-modal" type="button"
                                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Tidak,
                                                    kembali.</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                        @endrole
                        {{-- @endif --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
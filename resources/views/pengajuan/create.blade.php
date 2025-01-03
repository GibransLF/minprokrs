<x-app-layout>
    <x-slot name="header">
        <div class="flex itens-center">
            <h2 class="font-normal text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Pengajuan KRS /') }}
            </h2>
            &nbsp;
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Create') }}
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
                <div class="p-6 text-gray-900 dark:text-gray-100 justify-center">
                    <div class="flex flex-col justify-between p-4 leading-normal w-full">


                        <table id="simple-table">
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
                                            Pilih
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
                                        <div class="flex items-center mb-4">
                                            <input id="default-checkbox" type="checkbox" value=""
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        </div>
                                    </td>
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
                        <div class="flex justify-around mt-8">
                            <!-- kembali -->
                            <a href="{{route('pengajuan')}}" data-modal-target="canceled-modal"
                                data-modal-toggle="canceled-modal" type="button"
                                class="flex items-center justify-center text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Kembali</a>

                            <!-- confirm -->
                            <form action="{{route('dashboard')}}" method="post" class="">
                                @csrf
                                <a href="{{route('pengajuan')}}" data-modal-target="canceled-modal"
                                    data-modal-toggle="canceled-modal" type="button"
                                    class="flex items-center justify-center focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Konfirmasi
                                    pilihan</a>

                            </form>
                        </div>
                        {{-- @endif --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
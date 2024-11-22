<x-app-layout>
    <x-slot name="header">
        <div class="flex itens-center">
            <h2 class="font-normal text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Kontrak /') }}
            </h2>
            &nbsp;
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Pengisian KRS') }}
            </h2>
        </div>
    </x-slot>

    <div class="pt-12 -b-1">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 ">

            @if(session('success'))
            <x-toast type="success" :messages="[session('success')]" />
            @elseif($errors->any())
            <x-toast type="error" :messages="session('errors')->all()" />
            @elseif(session('error'))
            <x-toast type="error" :messages="[session('error')]" />
            @endif

        </div>
    </div>

    <div class="p-1">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 justify-center">
                    <div class="flex flex-col justify-between p-4 leading-normal w-full">

                        <form action="{{route('kontrak.store', $riwayatPembayaran->id)}}" method="post" class="">
                            @csrf
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
                                    @foreach ($data as $krs)
                                    <tr>
                                        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{$loop->iteration}}</td>
                                        <td>{{ $krs->matkul->kode_mk . ' - ' . $krs->matkul->nama_mk }}</td>
                                        <td>{{ $krs->dosen->nidn . ' - ' . $krs->dosen->nama_dosen }}</td>
                                        <td>{{ $krs->mulai . ' - ' . $krs->selesai }}</td>
                                        <td>{{ $krs->matkul->sks }}</td>
                                        <td>
                                            <div class="flex items-center mb-4">
                                                <input id="default-checkbox" type="checkbox" value="{{ $krs->id }}"
                                                    name="krs_ids[]"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="flex justify-around mt-8">
                                <!-- kembali -->
                                <a href="{{route('pengajuan')}}"
                                    class="flex items-center justify-center text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Kembali</a>

                                <!-- confirm -->

                                <button type="submit"
                                    class="flex items-center justify-center focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Konfirmasi
                                    pilihan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
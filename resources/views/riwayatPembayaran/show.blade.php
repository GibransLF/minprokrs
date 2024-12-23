<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <a href="{{ route('riwayatPembayaran') }}">
                <h2 class="font-normal text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Riwayat Pembayaran /') }}
                </h2>
            </a>
            &nbsp;
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $riwayatPembayaran->kode_pembayaran}}
            </h2>
        </div>
    </x-slot>

    <div class="pt-12 -b-1">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 justify-center">
                    <div class="flex flex-col justify-between p-4 leading-normal w-full">
                        <header>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600 dark:text-gray-400">Kode Transaksi:
                                    {{ $riwayatPembayaran->kode_pembayaran}}
                                </span>
                                @if ($riwayatPembayaran->status == 'pending')
                                <span
                                    class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
                                    {{ ucfirst($riwayatPembayaran->status) }}
                                </span>
                                @elseif ($riwayatPembayaran->status == 'rejected')
                                <span
                                    class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                                    {{ ucfirst($riwayatPembayaran->status) }}
                                </span>
                                @elseif ($riwayatPembayaran->status == 'verified')
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                    {{ ucfirst($riwayatPembayaran->status) }}
                                </span>
                                @else
                                <span
                                    class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">{{
                                    ucfirst($riwayatPembayaran->status) }}</span>
                                @endif
                            </div>
                        </header>
                        <hr class="h-px bg-gray-400 border-0 dark:bg-gray-700 mb-2">
                        <p class="text-gray-900 dark:text-gray-900 font-bold">Semester
                            {{ ucfirst($riwayatPembayaran->semester->nama_semester) . ' ' .
                            $riwayatPembayaran->semester->tahun_ajaran
                            }}</p>
                        <p class="text-gray-900 dark:text-gray-900 font-bold">
                            Konfirmasi oleh:
                            {{ ($riwayatPembayaran->admin?->user?->name) ?
                            $riwayatPembayaran->admin->user->name : '-'}}</p>
                        <p class="text-gray-900 dark:text-gray-900 font-bold">
                            Mahasiswa:
                            {{ $riwayatPembayaran->mahasiswa->nim }}
                            &nbsp;-&nbsp;
                            {{ $riwayatPembayaran->mahasiswa->user->name }}
                        </p>
                        <span
                            class="flex justify-end text-sm font-bold tracking-tight text-gray-900 dark:text-white">Dibuka
                            sampai {{ date('d-m-Y', strtotime($riwayatPembayaran->semester->mulai_kontrak)) }} - {{
                            date('d-m-Y',
                            strtotime($riwayatPembayaran->semester->tutup_kontrak)) }}</span>
                        <footer class="mt-1">
                            <hr class="h-px bg-gray-400 border-0 dark:bg-gray-700">
                            <div>
                                <span class="text-sm text-gray-600 dark:text-gray-400">Total Pembayaran
                                </span>
                                <span
                                    class="text-sm text-gray-600 dark:text-gray-400 font-bold">Rp.{{number_format($riwayatPembayaran->semester->nominal_pembayaran,
                                    2, ',', '.') }}</span>
                            </div>
                            <div>
                                <span class="text-sm text-gray-600 dark:text-gray-400">Keterangan:
                                    {{ ($riwayatPembayaran->Keterangan == '') ? 'Tidak ada Keterangan' :
                                    $riwayatPembayaran->Keterangan }}</span>
                                <span
                                    class="text-sm text-gray-600 dark:text-gray-400 font-bold">{{$riwayatPembayaran->Keterangan}}</span>
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
                <div class="flex justify-center">
                    <img class="h-auto max-w-full" src="{{asset('storage/'. $riwayatPembayaran->gambar)}}"
                        alt="image description">
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
                            <label for="deskripsi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi detal
                                pembayaran</label>
                            <textarea id="deskripsi" name="deskripsi" rows="4" disabled
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{$riwayatPembayaran->semester->deskripsi}}</textarea>
                            <hr class="h-px bg-gray-400 border-0 dark:bg-gray-700">
                            <div class="flex justify-between items-center font-bold text-lg">
                                <span class="text-gray-700 dark:text-gray-400 text-green-500">Total
                                    Pembayaran</span>
                                <span
                                    class="text-gray-700 dark:text-gray-400 text-green-500">Rp.{{number_format($riwayatPembayaran->semester->nominal_pembayaran,
                                    2, ',', '.') }}</span>
                            </div>

                            <br>
                            <hr class="h-px bg-gray-400 border-0 dark:bg-gray-700 mb-2">

                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                Transfer
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Nomor Rekening / Transfer
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                BCA
                                            </th>
                                            <td class="px-6 py-4">
                                                1234567890
                                            </td>
                                        </tr>
                                        <tr
                                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                DANA
                                            </th>
                                            <td class="px-6 py-4">
                                                1234567890
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </footer>
                        @role('admin')
                        @if ($riwayatPembayaran->status == 'pending')
                        <div class="flex justify-around mt-8">
                            <!-- canceled -->
                            <form action="{{route('riwayatPembayaran.rejected', $riwayatPembayaran->id)}}"
                                method="post">
                                @csrf
                                @method('PATCH')
                                <button data-modal-target="canceled-modal" data-modal-toggle="canceled-modal"
                                    type="button"
                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">Tolak
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
                                                    Tambahkan Keterangan alasan penolakan untuk ditujukan ke mahasiswa
                                                </h5>
                                                <svg class="mx-auto mb-2 text-gray-800 dark:text-white w-24 h-24"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd"
                                                        d="M3.559 4.544c.355-.35.834-.544 1.33-.544H19.11c.496 0 .975.194 1.33.544.356.35.559.829.559 1.331v9.25c0 .502-.203.981-.559 1.331-.355.35-.834.544-1.33.544H15.5l-2.7 3.6a1 1 0 0 1-1.6 0L8.5 17H4.889c-.496 0-.975-.194-1.33-.544A1.868 1.868 0 0 1 3 15.125v-9.25c0-.502.203-.981.559-1.331ZM7.556 7.5a1 1 0 1 0 0 2h8a1 1 0 0 0 0-2h-8Zm0 3.5a1 1 0 1 0 0 2H12a1 1 0 1 0 0-2H7.556Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <div>
                                                    <label for="keterangan"
                                                        class="block mb-2 text-sm font-medium text-red-700 dark:text-red-500 float-left">Keterangan</label>
                                                    <input name="keterangan" type="text" id="keterangan"
                                                        class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500"
                                                        placeholder="">
                                                    <p class="my-2 text-xs text-red-600 dark:text-red-500 float-left">
                                                        Keterangan <span class="font-medium">Alasan terjadinya
                                                            penolakan.</span></p>
                                                </div>
                                                <br>
                                                <h3 class="my-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                    Apakah anda yakin ingin tolak Transaksi ini?</h3>
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
                            <form action="{{route('riwayatPembayaran.verified', $riwayatPembayaran->id)}}"
                                method="post">
                                @csrf
                                @method('PATCH')
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
                                                    Apakah anda yakin?</h3>
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
                        @endif
                        @endrole
                        @role('mahasiswa')
                        @if ($riwayatPembayaran->status == 'rejected' &&
                        $riwayatPembayaran->semester->mulai_kontrak <= now() && $riwayatPembayaran->
                            semester->tutup_kontrak >= now())
                            <div class="flex justify-around mt-8">
                                <!-- kembali -->
                                <form action="{{route('riwayatPembayaran.update', $riwayatPembayaran->id)}}"
                                    method="post" enctype="multipart/form-data" class="">
                                    @csrf
                                    @method('PATCH')
                                    <div class="mb-4">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                            for="gambar">
                                            Upload file Bukti Pembayaran <span class="font-bold">Baru</span>
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
                            @endif
                            @if($riwayatPembayaran->status == 'verified')
                            <div class="flex justify-around mt-8">
                                <a href="{{ route('kontrak.create', $riwayatPembayaran->id) }}" type="button"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Isi
                                    KRS yang akan dipilih
                                </a>
                            </div>
                            @endif
                            @endrole
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
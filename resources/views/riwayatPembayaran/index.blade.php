<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-normal text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Pengajuan KRS /') }}
            </h2>
            &nbsp;
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Riwayat Pembayaran') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
            <x-toast type="success" :messages="[session('success')]" />
            @elseif($errors->any())
            <x-toast type="error" :messages="session('errors')->all()" />
            @elseif(session('error'))
            <x-toast type="error" :messages="[session('error')]" />
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 justify-center">

                    @hasrole('admin')
                    <form class="max-w-lg mx-auto" action="{{route('riwayatPembayaran')}}" method="get">
                        <label for="search"
                            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="search" id="search" name="nim"
                                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Cari NIM Mahasiswa" value="{{ request('nim') }}" />
                            <button type="submit"
                                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                        </div>
                    </form>
                    @endrole
                </div>
            </div>
        </div>
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 justify-center">
                    @foreach ($data as $riwayatPembayaran)
                    <a href="{{ route('riwayatPembayaran.show', $riwayatPembayaran->id) }}"
                        class="flex flex-col mb-4 items-center m-auto bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-3xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
                            src="{{asset('img/logoSTMIK.png')}}" alt="">
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
                                    @else
                                    <span
                                        class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                        {{ ucfirst($riwayatPembayaran->status) }}
                                    </span>
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
                    </a>
                    @endforeach

                    <div class="pagination m-4">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
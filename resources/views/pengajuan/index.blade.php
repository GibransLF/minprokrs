<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Pengajuan') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 ">

            @if(session('success'))
            <x-toast type="success" :messages="[session('success')]" />
            @elseif($errors->any())
            <x-toast type="error" :messages="session('errors')->all()" />
            @elseif(session('error'))
            <x-toast type="error" :messages="[session('error')]" />
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 justify-center">
                    @if (count($dataDibuka) + count($dataRiwayatPembayaran) == 0)
                    <div
                        class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                        <div
                            class="items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4 rtl:space-x-reverse">
                            <svg class="w-24 h-24 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </div>
                        <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">Tidak ada Semester baru saat
                            ini
                        </h5>
                        <p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400">Persiapkan diri anda untuk
                            mengikuti Semester yang akan datang</p>
                    </div>
                    @endif

                    @foreach ($dataDibuka as $semester)
                    <a href="{{ route('pengajuan.show', $semester->id) }}"
                        class="flex flex-col mb-4 items-center m-auto bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-3xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <img class="object-cover w-auto rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
                            src="{{asset('img/logoSTMIK.png')}}" alt="">
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
                    </a>
                    @endforeach

                    @foreach ($dataRiwayatPembayaran as $riwayatPembayaran)
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
                                '$riwayatPembayaran->admin->user->name' : '-'}}</p>
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
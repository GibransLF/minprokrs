<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @role('admin')
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                        {{-- Dosen --}}
                        <div
                            class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <svg class="w-7 h-7 text-gray-500 hover:text-gray-800 dark:text-gray-400 mb-3"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>

                            <div>
                                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                    Dosen</h5>
                            </div>
                            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Total
                                <span class="font-bold text-blue-800 dark:text-blue-200 leading-tight">{{$dosenT}}
                                </span>
                            </p>
                            <a href="{{route('dosen')}}"
                                class="inline-flex font-medium items-center text-blue-600 hover:underline">
                                Lihat Selengkapnya
                                <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                                </svg>
                            </a>
                        </div>
                        {{-- Mahasiswa --}}
                        <div
                            class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <svg class="w-7 h-7 text-gray-500 hover:text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                                    clip-rule="evenodd" />
                            </svg>


                            <div>
                                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                    Mahasiswa</h5>
                            </div>
                            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Total Akun Mahasiswa
                                <span class="font-bold text-blue-800 dark:text-blue-200 leading-tight">{{$akunMhs}}
                                </span>
                            </p>
                            <a href="{{route('mahasiswa')}}"
                                class="inline-flex font-medium items-center text-blue-600 hover:underline">
                                Lihat Selengkapnya
                                <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                                </svg>
                            </a>
                        </div>
                        {{-- Pembayaran --}}
                        <div
                            class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <svg class="w-7 h-7 text-gray-500 hover:text-gray-800 dark:text-gray-400 mb-3"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M8 17.345a4.76 4.76 0 0 0 2.558 1.618c2.274.589 4.512-.446 4.999-2.31.487-1.866-1.273-3.9-3.546-4.49-2.273-.59-4.034-2.623-3.547-4.488.486-1.865 2.724-2.899 4.998-2.31.982.236 1.87.793 2.538 1.592m-3.879 12.171V21m0-18v2.2" />
                            </svg>

                            <a href="#">
                                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                    Pembayaran</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Pending {{$rpPending}}</p>
                            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400"></p>
                            <a href="{{route('riwayatPembayaran')}}"
                                class="inline-flex font-medium items-center text-blue-600 hover:underline">
                                Lihat Selengkapnya
                                <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    @if(count($semesters) != 0)
                    <p class="text-4xl font-semibold mt-8 my-4 text-gray-900 dark:text-white">Semester
                        <span class="text-green-800 dark:bg-green-900 dark:text-green-300">Aktif</span>
                    </p>
                    @endif
                    @foreach ($semesters as $semester)
                    <div
                        class="flex flex-col mb-4 items-center m-auto bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-3xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <a href="{{ route('semester') }}" class=" flex flex-col justify-between p-4 leading-normal
                            w-full">
                            <header>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-900 dark:text-gray-900 font-bold">
                                        Semester
                                    </span>
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
                            <p class="flex text-sm font-bold tracking-tight text-gray-900 dark:text-white">
                                Dibuka
                                sampai {{ date('d-m-Y', strtotime($semester->mulai_kontrak)) }} - {{ date('d-m-Y',
                                strtotime($semester->tutup_kontrak)) }}</p>
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
                        </a>

                        <a href="{{ route('riwayatPembayaran') }}"
                            class="flex flex-col justify-between p-4 leading-normal w-full">
                            <header>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-900 dark:text-gray-900 font-bold">
                                        Mahasiswa
                                    </span>
                                    <span
                                        class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
                                        {{ ucfirst("Pending") }}
                                    </span>
                                </div>
                            </header>
                            <hr class="h-px bg-gray-400 border-0 dark:bg-gray-700 mb-2">
                            @if($rpPending != 0)
                            @foreach ($rp as $rpm)

                            <p class="text-gray-900 dark:text-gray-900 font-bold">
                                {{$rpm->mahasiswa->nim}}
                                &nbsp;-&nbsp;
                                ucwords{{$rpm->mahasiswa->user->name}}</p>
                            @endforeach
                            @else
                            <p class="text-gray-900 dark:text-gray-900 font-bold">
                                Tidak ada mahasiswa</p>
                            @endif
                            <footer class="mt-1">
                                <hr class="h-px bg-gray-400 border-0 dark:bg-gray-700">
                                <div class="flex justify-between">
                                    <div>
                                        <span class="text-sm text-gray-600 dark:text-gray-400">Total Mahasiswa
                                        </span>
                                        <span
                                            class="text-sm text-gray-600 dark:text-gray-400 font-bold">{{$rpPending}}</span>
                                    </div>
                                </div>
                            </footer>
                        </a>
                    </div>
                    @endforeach

                    @endrole

                    @role('mahasiswa')
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-1">
                        {{-- SKS --}}
                        <div
                            class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <svg class="w-7 h-7 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2a1 1 0 0 0 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z"
                                    clip-rule="evenodd" />
                            </svg>

                            <div>
                                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                    SKS</h5>
                            </div>
                            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Total SKS diambil
                                <span class="font-bold text-blue-800 dark:text-blue-200 leading-tight"> {{$sumSks}}
                                </span>
                            </p>
                            <a href="{{route('kontrak')}}"
                                class="inline-flex font-medium items-center text-blue-600 hover:underline">
                                Lihat Selengkapnya
                                <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                                </svg>
                            </a>
                        </div>
                        {{-- Kontrak --}}
                        <div
                            class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <svg class="w-7 h-7 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2a1 1 0 0 0 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z"
                                    clip-rule="evenodd" />
                            </svg>

                            <div>
                                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                    Kontrak</h5>
                            </div>
                            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Total pengajuan Kontrak KRS
                                <span class="font-bold text-blue-800 dark:text-blue-200 leading-tight">{{ $sumKontrak }}
                                </span>
                            </p>
                            <a href="{{route('kontrak')}}"
                                class="inline-flex font-medium items-center text-blue-600 hover:underline">
                                Lihat Selengkapnya
                                <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    @if ($info->status == 'pending')
                    <div class="flex items-center p-4 m-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300"
                        role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">Pengajuan status Pending!</span> tunggu admin menkonfirmasi bukti
                            pembayaran anda.
                        </div>
                    </div>
                    @elseif ($info->status == 'verified')
                    <div class="flex items-center p-4 m-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                        role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">Pengajuan status Verified!</span> anda dapat mengisi KRS anda. <a
                                href="{{ route('kontrak.create', $info->id) }}"
                                class="text-blue-600 underline dark:text-blue-500 hover:no-underline">Klik
                                di sini!.</a>
                        </div>
                    </div>
                    @elseif ($info->status == 'rejected')
                    <div class="flex items-center p-4 m-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                        role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">Pengajuan diTolak!</span>&nbsp;
                            {{ ($info->Keterangan == '') ? 'Tidak ada Keterangan' :
                            $info->Keterangan }}. &nbsp;<a href="{{ route('pengajuan') }}"
                                class="text-blue-600 underline dark:text-blue-500 hover:no-underline">Selengapnya.</a>
                        </div>
                    </div>
                    @endif

                    @if(count($semesters) == 0)
                    <div
                        class="mt-8 w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">Semester baru belum
                            tersedia
                        </h5>
                        <p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400">Persiapkan diri anda
                            untuk
                            mengikuti Semester yang akan datang.</p>
                        <div
                            class="items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4 rtl:space-x-reverse">
                            <div
                                class="w-full sm:w-auto text-center bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 dark:bg-gray-800 dark:border-gray-700 inline-flex items-center justify-center px-4 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                                <svg class="flex-shrink-0 me-3 w-7 h-7 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M10 3v4a1 1 0 0 1-1 1H5m5 4-2 2 2 2m4-4 2 2-2 2m5-12v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z" />
                                </svg>
                                <div class="text-left rtl:text-right">
                                    <div class="mb-1 text-xs">Lihat detail di</div>
                                    <div class="-mt-1 font-sans text-sm font-semibold">Pengajuan</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div
                        class="mt-8 w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">Semester baru telah
                            tersedia
                        </h5>
                        @foreach ($semesters as $semester)

                        <p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400">Dibuka
                            {{ date('d-m-Y', strtotime($semester->mulai_kontrak)) }} s.d {{ date('d-m-Y',
                            strtotime($semester->tutup_kontrak)) }}</p>
                        @endforeach
                        <div
                            class="items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4 rtl:space-x-reverse">
                            <a href="{{route('pengajuan')}}"
                                class="w-full sm:w-auto text-center bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 dark:bg-gray-800 dark:border-gray-700 inline-flex items-center justify-center px-4 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                                <svg class="flex-shrink-0 me-3 w-7 h-7 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M10 3v4a1 1 0 0 1-1 1H5m5 4-2 2 2 2m4-4 2 2-2 2m5-12v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z" />
                                </svg>
                                <div class="text-left rtl:text-right">
                                    <div class="mb-1 text-xs">Lihat detail di</div>
                                    <div class="-mt-1 font-sans text-sm font-semibold">Pengajuan</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endif
                    @endrole
                </div>
            </div>
        </div>
</x-app-layout>
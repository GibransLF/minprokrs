<x-app-layout>
    <x-slot name="header">
        <div class="flex itens-center">
            <h2 class="font-normal text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Pengajuan KRS /') }}
            </h2>
            &nbsp;
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Bukti Pembayaran') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 justify-center">
                    {{-- @foreach ($transaksis as $transaksi) --}}
                    <a href="{{route('pengajuan.detail')}}" class="flex flex-col mb-4
                        items-center m-auto bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-3xl
                        hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
                            src="{{asset('img/logoSTMIK.png')}}" alt="">
                        <div class="flex flex-col justify-between p-4 leading-normal w-full">
                            <header>
                                <div class="flex justify-between items-center">
                                    <span
                                        class="text-sm font-bold tracking-tight text-gray-900 dark:text-white">Semester
                                        Genap 2024</span>
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
                            <p class="text-gray-900 dark:text-gray-900 font-bold">Jurusan:
                                Sistem Informasi</p>
                            {{-- <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">+produk lainnya</p> --}}
                            <span
                                class="flex justify-end text-sm font-bold tracking-tight text-gray-900 dark:text-white">Tgl
                                dibuat</span>
                            <footer class="mt-1">
                                <hr class="h-px bg-gray-400 border-0 dark:bg-gray-700">
                                <div class="flex justify-between">
                                    <div>
                                        <span class="text-sm text-gray-600 dark:text-gray-400">Total Pembayaran </span>
                                        <span
                                            class="text-sm text-gray-600 dark:text-gray-400 font-bold">Rp.{{number_format('2500000',
                                            2, ',', '.') }}</span>
                                    </div>
                                </div>
                            </footer>
                        </div>
                    </a>
                    {{-- @endforeach
                    <div class="pagination m-4">
                        {{ $transaksis->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<!-- Main modal -->
<div id="edit-modal{{$semester->id}}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Ubah Data Semester
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="edit-modal{{$semester->id}}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" action="{{route('semester.update', $semester->id)}}" method="POST">
                @CSRF
                @method('PATCH')
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="kontrak" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun
                            Semester</label>
                        <ul
                            class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input {{ $semester->nama_semester == 'ganjil' ? 'checked' : '' }}
                                    id="ganjil" type="radio" value="ganjil" name="nama_semester"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500
                                    dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700
                                    focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="ganjil"
                                        class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ganjil
                                    </label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input {{ $semester->nama_semester == 'genap' ? 'checked' : '' }}
                                    id="genap" type="radio" value="genap" name="nama_semester"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500
                                    dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700
                                    focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="genap"
                                        class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Genap</label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input {{ $semester->nama_semester == 'antara' ? 'checked' : '' }} id="antara"
                                    type="radio" value="antara" name="nama_semester"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500
                                    dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700
                                    focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="antara"
                                        class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Antara</label>
                                </div>
                            </li>
                        </ul>
                        <x-input-error :messages="$errors->get('nama_semester')" class="mt-2" />
                    </div>
                    <div class="col-span-2">
                        <label for="fakultas_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
                            tahun ajaran</label>
                        <select id="tahun_ajaran" name="tahun_ajaran"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option value="{{$semester->tahun_ajaran}}" hidden>{{$semester->tahun_ajaran}}
                            </option>
                            @for($i = now()->year - 2; $i <= now()->year + 2; $i++)
                                @php
                                $j = $i + 1;
                                @endphp
                                <option value="{{$i}}-{{$j}}">{{$i}}-{{$j}}</option>
                                @endfor
                        </select>
                        <x-input-error :messages="$errors->get('tahun_ajaran')" class="mt-2" />
                    </div>
                    <div class="col-span-2">
                        <label for="kontrak{{ $semester->id }}"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu
                            Kontrak</label>
                        @php
                        $mulai = date('d-m-Y', strtotime($semester->mulai_kontrak));
                        $tutup = date('d-m-Y', strtotime($semester->tutup_kontrak));
                        @endphp
                        <div id="kontrak{{ $semester->id }}" date-rangepicker datepicker-format="dd-mm-yyyy"
                            class="flex items-center">
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input value="{{ $mulai }}" id="datepicker-range-start" name="mulai_kontrak" type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="{{ $mulai }}">
                            </div>
                            <span class="mx-4 text-gray-500">&nbsp;~&nbsp;</span>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input value="{{ $tutup }}" id="datepicker-range-end" name="tutup_kontrak" type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="{{ $tutup }}">
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('mulai_kontrak')" class="mt-2" />
                        <x-input-error :messages="$errors->get('tutup_kontrak')" class="mt-2" />
                    </div>
                    <div class="col-span-2">
                        <label for="nominal_pembayaran"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nominal
                            pembayaran</label>
                        <input type="number" name="nominal_pembayaran" id="nominal_pembayaran" autocomplete="off"
                            inputmode="numeric" min="0"
                            class="appearance-none [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="{{ $semester->nominal_pembayaran }}" required=""
                            value="{{ $semester->nominal_pembayaran }}">
                        <x-input-error :messages="$errors->get('nominal_pembayaran')" class="mt-2" />
                    </div>

                    <div class="col-span-2">
                        <label for="deskripsi"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi detal
                            pembayaran</label>
                        <textarea id="deskripsi" name="deskripsi" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="{{ $semester->deskripsi }}">{{ $semester->deskripsi }}</textarea>
                        <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                    </div>
                </div>
                <button type="submit"
                    class="text-white inline-flex items-center bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                    <svg class="me-1 -ms-1 w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z"
                            clip-rule="evenodd" />
                        <path fill-rule="evenodd"
                            d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z"
                            clip-rule="evenodd" />
                    </svg>
                    Ubah data semester
                </button>
            </form>
        </div>
    </div>
</div>
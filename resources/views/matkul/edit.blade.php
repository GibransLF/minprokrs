<!-- Main modal -->
<div id="edit-modal{{ $matkul->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Ubah Mata Kuliah Baru
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="edit-modal{{ $matkul->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" action="{{route('matkul.update', $matkul->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="jurusan_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
                            Jurusan</label>
                        <select id="jurusan_id" name="jurusan_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option value="{{ $matkul->jurusan_id }}" hidden>{{ $matkul->jurusan->nama_jurusan}}
                            </option>
                            @foreach ( $addJurusan as $jurusan )
                            <option value="{{$jurusan->id}}">{{$jurusan->nama_jurusan}}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('jurusan_id')" class="mt-2" />
                    </div>
                    <div class="col-span-2">
                        <label for="dosen_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
                            Dosen Pengampu</label>
                        <select id="dosen_id" name="dosen_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option value="{{$matkul->dosen_id}}" hidden>{{ $matkul->dosen->nama_dosen }}</option>
                            @foreach ( $addDosen as $dosen )
                            <option value="{{$dosen->id}}">{{$dosen->nama_dosen}}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('dosen_id')" class="mt-2" />
                    </div>
                    <div class="col-span-2">
                        <label for="kode_mk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                            Mata
                            kuliah</label>
                        <input type="text" name="kode_mk" id="kode_mk" value="{{ $matkul->kode_mk }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Ketikan kode jMata Kuliah" required="">
                        <x-input-error :messages="$errors->get('kode_mk')" class="mt-2" />
                    </div>
                    <div class="col-span-2">
                        <label for="nama_mk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            Mata Kuliah</label>
                        <input type="text" name="nama_mk" id="nama_mk" value="{{ $matkul->nama_mk }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Ketikan nama jurusan" required="">
                        <x-input-error :messages="$errors->get('nama_mk')" class="mt-2" />
                    </div>
                    <div class="col-span-2">
                        <label for="sks"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SKS</label>
                        <input type="number" name="sks" id="sks" required inputmode="numeric" min="0"
                            class="appearance-none [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukan SKS" required="" value="{{ $matkul->sks }}">
                        <x-input-error :messages="$errors->get('sks')" class="mt-2" />
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
                    Ubah data Mata Kuliah
                </button>
            </form>
        </div>
    </div>
</div>
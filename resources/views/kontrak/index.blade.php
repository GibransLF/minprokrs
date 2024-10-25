<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-normal text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Akademik /') }}
            </h2>
            &nbsp;
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Kontrak KRS') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="text-4xl mb-4 font-semibold text-gray-900 dark:text-white">Kontrak KRS</p>
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
                                        NIM
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Mahasiswa
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Semester
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Total KRS
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Action
                                    </span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($data as $admin) --}}

                            <tr>
                                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    1</td>
                                <td>0123210</td>
                                <td>Nama Mahasiswa</td>
                                <td>Genap 2024</td>
                                <td>18</td>
                                <td>
                                    <a type="button" href="{{ route('kontrak.detail') }}"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Detail</a>
                                    {{-- @include('mahasiswa.detail') --}}
                                </td>
                            </tr>

                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
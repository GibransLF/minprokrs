<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Setting') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if(session('success'))
            <x-toast type="success" :messages="[session('success')]" />
            @elseif($errors->any())
            <x-toast type="error" :messages="session('errors')->all()" />
            @elseif(session('error'))
            <x-toast type="error" :messages="[session('error')]" />
            @endif

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">

                    <form action="{{ route('setting.updateLogo') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Logo Aplikasi') }}
                        </h2>

                        <img class="h-auto max-w-lg rounded-lg m-4" src="{{ asset('img/logoSTMIK.png') }}" alt="logo">

                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="file_input">Ubah gambar logo</label>
                        <input name="logo"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="file_input_help" id="file_input" type="file">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG (MAX.
                            500KB).</p>


                        <div class="flex justify-end mt-4">
                            <button type="submit"
                                class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">

                    <form action="{{ route('setting.updateSvg') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Logo Print') }}
                        </h2>

                        <img class="h-auto max-w-lg rounded-lg m-4" src="{{ asset('img/logoSTMIK.svg') }}"
                            alt="logo print">

                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="file_input">Ubah gambar logo Print</label>
                        <input name="logoPrint"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="file_input_help" id="file_input" type="file">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG untuk
                            minimalisir ukuran (MAX.
                            500KB).</p>


                        <div class="flex justify-end mt-4">
                            <button type="submit"
                                class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Ubah</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
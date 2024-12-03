<x-app-layout>
    <div class="flex items-center justify-center min-h-screen text-gray-900 dark:text-gray-100">

        <div class=" max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-center">

                <svg class="w-64 h-64 text-gray-800 dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="128" height="128" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z"
                        clip-rule="evenodd" />
                </svg>
            </div>
            <div class="p-5 mx-4">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">
                        Pengisian Berhasil</h5>
                </a>
                <span class="mb-3 font-normal text-gray-700 dark:text-gray-400"> download file bukti Pembayaran
                    <a href="{{ route('kontrak.download', $riwayatPembayaran->id) }}"
                        class="text-blue-600 underline dark:text-blue-500 hover:no-underline">Klik
                        di sini!.</a>
                    atau cek di kontrak KRS / detail.
                </span>
                <br>
                <div class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                    <span>Halaman akan dipindahkan otomatis dalam</span>
                    <span id="countdown">7</span>
                    <span> detik.</span>
                </div>
                <a href="{{route('kontrak')}}"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    klik jika otomatis bermasalah </a>
            </div>
        </div>

    </div>
</x-app-layout>

<script>
    let countdownElement = document.getElementById('countdown');
    let countdown = 7;

    function updateCountdown() {
        countdown--;
        countdownElement.textContent = countdown;
        if (countdown === 0) {
            clearInterval(interval);
            window.location.href = "{{ route('kontrak') }}";
        }
    }

    let interval = setInterval(updateCountdown, 1000);
</script>
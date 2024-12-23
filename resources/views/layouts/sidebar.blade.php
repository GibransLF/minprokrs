<!-- drawer component -->
<div id="drawer-navigation"
   class="fixed top-0 left-0 z-40 w-64 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white dark:bg-gray-800"
   tabindex="-1" aria-labelledby="drawer-navigation-label">
   <h5 id="drawer-navigation-label" class="text-base font-semibold text-gray-500 uppercase dark:text-gray-400">Menu</h5>
   <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation"
      class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 end-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
         xmlns="http://www.w3.org/2000/svg">
         <path fill-rule="evenodd"
            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
            clip-rule="evenodd"></path>
      </svg>
      <span class="sr-only">Close menu</span>
   </button>
   <div class="py-4 overflow-y-auto">
      <ul class="space-y-2 font-medium">
         <li>
            <x-side-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
               <x-slot name="icon">
                  <svg
                     class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                     aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                     <path
                        d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                     <path
                        d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                  </svg>
               </x-slot>
               Dashboard
            </x-side-link>
         </li>

         {{-- Institusi Pendidikan --}}
         <li>
            <x-side-dropdown-link title="Institusi Pendidikan"
               :active="request()->routeIs('fakultas') || request()->routeIs('jurusan')">
               <x-slot name="icon">
                  <svg
                     class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                     aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                     viewBox="0 0 24 24">
                     <path fill-rule="evenodd"
                        d="M10.915 2.345a2 2 0 0 1 2.17 0l7 4.52A2 2 0 0 1 21 8.544V9.5a1.5 1.5 0 0 1-1.5 1.5H19v6h1a1 1 0 1 1 0 2H4a1 1 0 1 1 0-2h1v-6h-.5A1.5 1.5 0 0 1 3 9.5v-.955a2 2 0 0 1 .915-1.68l7-4.52ZM17 17v-6h-2v6h2Zm-6-6h2v6h-2v-6Zm-2 6v-6H7v6h2Z"
                        clip-rule="evenodd" />
                     <path d="M2 21a1 1 0 0 1 1-1h18a1 1 0 1 1 0 2H3a1 1 0 0 1-1-1Z" />
                  </svg>

               </x-slot>

               <x-side-dropdown-item href="{{ route('fakultas') }}" :active="request()->routeIs('fakultas')">
                  Fakultas
               </x-side-dropdown-item>

               <x-side-dropdown-item href="{{ route('jurusan') }}" :active="request()->routeIs('jurusan')">
                  Jurusan
               </x-side-dropdown-item>

            </x-side-dropdown-link>
         </li>

         {{-- Akademik --}}
         <li>
            <x-side-dropdown-link title="Akademik"
               :active="request()->routeIs('dosen') || request()->routeIs('matkul') || request()->routeIs('semester') || request()->routeIs('jadwalPerkuliahan') || request()->routeIs('mahasiswa')">
               <x-slot name="icon">
                  <svg
                     class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                     aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                     viewBox="0 0 24 24">
                     <path fill-rule="evenodd"
                        d="M5 8a4 4 0 1 1 7.796 1.263l-2.533 2.534A4 4 0 0 1 5 8Zm4.06 5H7a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h2.172a2.999 2.999 0 0 1-.114-1.588l.674-3.372a3 3 0 0 1 .82-1.533L9.06 13Zm9.032-5a2.907 2.907 0 0 0-2.056.852L9.967 14.92a1 1 0 0 0-.273.51l-.675 3.373a1 1 0 0 0 1.177 1.177l3.372-.675a1 1 0 0 0 .511-.273l6.07-6.07a2.91 2.91 0 0 0-.944-4.742A2.907 2.907 0 0 0 18.092 8Z"
                        clip-rule="evenodd" />
                  </svg>

               </x-slot>

               <x-side-dropdown-item href="{{ route('dosen') }}" :active="request()->routeIs('dosen')">
                  Dosen
               </x-side-dropdown-item>

               <x-side-dropdown-item href="{{ route('matkul') }}" :active="request()->routeIs('matkul')">
                  Mata Kuliah
               </x-side-dropdown-item>

               <x-side-dropdown-item href="{{ route('semester') }}"
                  :active="request()->routeIs('semester') || request()->routeIs('jadwalPerkuliahan')">
                  Semester
               </x-side-dropdown-item>

               <x-side-dropdown-item href="{{ route('mahasiswa') }}" :active="request()->routeIs('mahasiswa')">
                  Mahasiswa
               </x-side-dropdown-item>

            </x-side-dropdown-link>
         </li>

         {{-- Pengajuan KRS --}}
         <li>
            <x-side-dropdown-link title="Pengajuan KRS"
               :active="request()->routeIs('riwayatPembayaran') || request()->routeIs('kontrak')">
               <x-slot name="icon">
                  <svg
                     class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                     aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                     viewBox="0 0 24 24">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 3v4a1 1 0 0 1-1 1H5m5 4-2 2 2 2m4-4 2 2-2 2m5-12v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z" />
                  </svg>

               </x-slot>

               <x-side-dropdown-item href="{{ route('riwayatPembayaran') }}"
                  :active="request()->routeIs('riwayatPembayaran')">
                  Riwayat Pembayaran
               </x-side-dropdown-item>

               <x-side-dropdown-item href="{{ route('kontrak') }}" :active="request()->routeIs('kontrak')">
                  Kontrak KRS
               </x-side-dropdown-item>

            </x-side-dropdown-link>
         </li>
         {{-- user admin --}}
         <li>
            <x-side-dropdown-link title="User" :active="request()->routeIs('admin')">
               <x-slot name="icon">
                  <svg
                     class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                     aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                     viewBox="0 0 24 24">
                     <path fill-rule="evenodd"
                        d="M4 4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4Zm10 5a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-8-5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm1.942 4a3 3 0 0 0-2.847 2.051l-.044.133-.004.012c-.042.126-.055.167-.042.195.006.013.02.023.038.039.032.025.08.064.146.155A1 1 0 0 0 6 17h6a1 1 0 0 0 .811-.415.713.713 0 0 1 .146-.155c.019-.016.031-.026.038-.04.014-.027 0-.068-.042-.194l-.004-.012-.044-.133A3 3 0 0 0 10.059 14H7.942Z"
                        clip-rule="evenodd" />
                  </svg>


               </x-slot>

               <x-side-dropdown-item href="{{ route('admin') }}" :active="request()->routeIs('admin')">
                  Admin
               </x-side-dropdown-item>

            </x-side-dropdown-link>
         </li>
      </ul>
   </div>
</div>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kelola Profil Kelurahan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 sm:p-8 text-gray-900 dark:text-gray-100">

                    @if (session('success'))
                        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.profile.update') }}">
                        @csrf
                        @method('PATCH')

                        {{-- SEJARAH, VISI, & MISI --}}
                        <div class="mt-4">
                            <x-input-label for="history" :value="__('Sejarah Singkat')" />
                            <textarea id="history" name="history" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" rows="5" required>{{ old('history', $profile->history ?? '') }}</textarea>
                            <x-input-error :messages="$errors->get('history')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="vision" :value="__('Visi')" />
                            <textarea id="vision" name="vision" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" rows="3" required>{{ old('vision', $profile->vision ?? '') }}</textarea>
                            <x-input-error :messages="$errors->get('vision')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="mission" :value="__('Misi')" />
                            <textarea id="mission" name="mission" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" rows="5" required>{{ old('mission', $profile->mission ?? '') }}</textarea>
                            <x-input-error :messages="$errors->get('mission')" class="mt-2" />
                        </div>

                        {{-- BATAS WILAYAH --}}
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mt-6 mb-2">Batas Wilayah</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <x-input-label for="north_boundary" :value="__('Utara')" />
                                <x-text-input id="north_boundary" class="block mt-1 w-full" type="text" name="north_boundary" :value="old('north_boundary', $profile->north_boundary ?? '')" required />
                            </div>
                            <div>
                                <x-input-label for="east_boundary" :value="__('Timur')" />
                                <x-text-input id="east_boundary" class="block mt-1 w-full" type="text" name="east_boundary" :value="old('east_boundary', $profile->east_boundary ?? '')" required />
                            </div>
                            <div>
                                <x-input-label for="south_boundary" :value="__('Selatan')" />
                                <x-text-input id="south_boundary" class="block mt-1 w-full" type="text" name="south_boundary" :value="old('south_boundary', $profile->south_boundary ?? '')" required />
                            </div>
                            <div>
                                <x-input-label for="west_boundary" :value="__('Barat')" />
                                <x-text-input id="west_boundary" class="block mt-1 w-full" type="text" name="west_boundary" :value="old('west_boundary', $profile->west_boundary ?? '')" required />
                            </div>
                        </div>

                        {{-- DATA KEPENDUDUKAN LAMA --}}
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mt-6 mb-2">Data Kependudukan</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="population_total" :value="__('Total Penduduk')" />
                                <x-text-input id="population_total" class="block mt-1 w-full" type="number" name="population_total" :value="old('population_total', $profile->population_total ?? 0)" required />
                            </div>
                            <div>
                                <x-input-label for="household_count" :value="__('Jumlah Kepala Keluarga (KK)')" />
                                <x-text-input id="household_count" class="block mt-1 w-full" type="number" name="household_count" :value="old('household_count', $profile->household_count ?? 0)" required />
                            </div>
                            <div>
                                <x-input-label for="population_male" :value="__('Jumlah Penduduk Laki-laki')" />
                                <x-text-input id="population_male" class="block mt-1 w-full" type="number" name="population_male" :value="old('population_male', $profile->population_male ?? 0)" required />
                            </div>
                            <div>
                                <x-input-label for="population_female" :value="__('Jumlah Penduduk Perempuan')" />
                                <x-text-input id="population_female" class="block mt-1 w-full" type="number" name="population_female" :value="old('population_female', $profile->population_female ?? 0)" required />
                            </div>
                        </div>
                        
                        {{-- ================================================== --}}
                        {{-- === BAGIAN BARU UNTUK DATA WILAYAH & DEMOGRAFI === --}}
                        {{-- ================================================== --}}
                        <hr class="my-8 border-gray-300 dark:border-gray-700">

                        <div>
                            <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">Data Wilayah & Demografi Detail</h3>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Masukkan data detail mengenai wilayah dan kependudukan.</p>
                        </div>
                        
                        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                            <div class="sm:col-span-2">
                                <x-input-label for="luas_wilayah" value="Luas Wilayah (Contoh: 15.5 km²)" />
                                <x-text-input id="luas_wilayah" name="luas_wilayah" type="text" class="mt-1 block w-full" :value="old('luas_wilayah', $profile->luas_wilayah)" />
                            </div>
                            <div class="sm:col-span-2">
                                <x-input-label for="jumlah_rt" value="Jumlah RT" />
                                <x-text-input id="jumlah_rt" name="jumlah_rt" type="number" class="mt-1 block w-full" :value="old('jumlah_rt', $profile->jumlah_rt)" />
                            </div>
                            <div class="sm:col-span-2">
                                <x-input-label for="jumlah_rw" value="Jumlah RW" />
                                <x-text-input id="jumlah_rw" name="jumlah_rw" type="number" class="mt-1 block w-full" :value="old('jumlah_rw', $profile->jumlah_rw)" />
                            </div>
                        
                            {{-- Kelompok Usia --}}
                            <div class="sm:col-span-3">
                                <x-input-label for="penduduk_anak" value="Jumlah Penduduk (Anak-anak)" />
                                <x-text-input id="penduduk_anak" name="penduduk_anak" type="number" class="mt-1 block w-full" :value="old('penduduk_anak', $profile->penduduk_anak)" />
                            </div>
                            <div class="sm:col-span-3">
                                <x-input-label for="penduduk_remaja" value="Jumlah Penduduk (Remaja)" />
                                <x-text-input id="penduduk_remaja" name="penduduk_remaja" type="number" class="mt-1 block w-full" :value="old('penduduk_remaja', $profile->penduduk_remaja)" />
                            </div>
                            <div class="sm:col-span-3">
                                <x-input-label for="penduduk_dewasa" value="Jumlah Penduduk (Dewasa)" />
                                <x-text-input id="penduduk_dewasa" name="penduduk_dewasa" type="number" class="mt-1 block w-full" :value="old('penduduk_dewasa', $profile->penduduk_dewasa)" />
                            </div>
                            <div class="sm:col-span-3">
                                <x-input-label for="penduduk_lansia" value="Jumlah Penduduk (Lansia)" />
                                <x-text-input id="penduduk_lansia" name="penduduk_lansia" type="number" class="mt-1 block w-full" :value="old('penduduk_lansia', $profile->penduduk_lansia)" />
                            </div>
                        
                            {{-- Mata Pencaharian --}}
                            <div class="sm:col-span-3">
                                <x-input-label for="pencaharian_pns" value="Mata Pencaharian (PNS)" />
                                <x-text-input id="pencaharian_pns" name="pencaharian_pns" type="number" class="mt-1 block w-full" :value="old('pencaharian_pns', $profile->pencaharian_pns)" />
                            </div>
                            <div class="sm:col-span-3">
                                <x-input-label for="pencaharian_wiraswasta" value="Mata Pencaharian (Wiraswasta)" />
                                <x-text-input id="pencaharian_wiraswasta" name="pencaharian_wiraswasta" type="number" class="mt-1 block w-full" :value="old('pencaharian_wiraswasta', $profile->pencaharian_wiraswasta)" />
                            </div>
                            <div class="sm:col-span-3">
                                <x-input-label for="pencaharian_petani" value="Mata Pencaharian (Petani)" />
                                <x-text-input id="pencaharian_petani" name="pencaharian_petani" type="number" class="mt-1 block w-full" :value="old('pencaharian_petani', $profile->pencaharian_petani)" />
                            </div>
                             <div class="sm:col-span-3">
                                <x-input-label for="pencaharian_lainnya" value="Mata Pencaharian (Lainnya)" />
                                <x-text-input id="pencaharian_lainnya" name="pencaharian_lainnya" type="number" class="mt-1 block w-full" :value="old('pencaharian_lainnya', $profile->pencaharian_lainnya)" />
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <x-primary-button>
                                {{ __('Simpan Perubahan') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
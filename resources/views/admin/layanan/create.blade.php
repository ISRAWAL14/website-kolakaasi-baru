<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Layanan Surat Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('admin.layanan.store') }}">
                        @csrf
                        
                        <div>
                            <x-input-label for="name" :value="__('Nama Layanan Surat')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="requirements" :value="__('Syarat-syarat (Pisahkan dengan baris baru)')" />
                            <textarea id="requirements" name="requirements" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" rows="5" required>{{ old('requirements') }}</textarea>
                            <x-input-error :messages="$errors->get('requirements')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="flow" :value="__('Alur Proses (Pisahkan dengan baris baru)')" />
                            <textarea id="flow" name="flow" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" rows="5" required>{{ old('flow') }}</textarea>
                            <x-input-error :messages="$errors->get('flow')" class="mt-2" />
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                             <div>
                                <x-input-label for="duration" :value="__('Estimasi Waktu Penyelesaian')" />
                                <x-text-input id="duration" class="block mt-1 w-full" type="text" name="duration" :value="old('duration', '1 Hari Kerja')" />
                                <x-input-error :messages="$errors->get('duration')" class="mt-2" />
                            </div>
                             <div>
                                <x-input-label for="cost" :value="__('Biaya')" />
                                <x-text-input id="cost" class="block mt-1 w-full" type="text" name="cost" :value="old('cost', 'Gratis')" />
                                <x-input-error :messages="$errors->get('cost')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Simpan Layanan') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
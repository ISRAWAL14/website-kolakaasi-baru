<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Perangkat Kelurahan Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    {{-- PERUBAHAN 1: Menambahkan enctype untuk upload file --}}
                    <form method="POST" action="{{ route('admin.perangkat.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <x-input-label for="name" :value="__('Nama Lengkap')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="position" :value="__('Jabatan')" />
                            <x-text-input id="position" class="block mt-1 w-full" type="text" name="position" :value="old('position')" required />
                            <x-input-error :messages="$errors->get('position')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="tupoksi" :value="__('Tugas Pokok dan Fungsi (Tupoksi)')" />
                            <textarea id="tupoksi" name="tupoksi" rows="4" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('tupoksi') }}</textarea>
                            <x-input-error :messages="$errors->get('tupoksi')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="masa_jabatan" :value="__('Masa Jabatan (Contoh: 2023 - 2028)')" />
                            <x-text-input id="masa_jabatan" class="block mt-1 w-full" type="text" name="masa_jabatan" :value="old('masa_jabatan')" />
                            <x-input-error :messages="$errors->get('masa_jabatan')" class="mt-2" />
                        </div>

                        <div class="mt-4" x-data="{ photoName: null, photoPreview: null }">
                            <x-input-label for="foto" :value="__('Foto Perangkat (Opsional)')" />
                            
                            <input id="foto" name="foto" type="file" class="hidden" x-ref="photo" @change=" photoName = $event.target.files[0].name; const reader = new FileReader(); reader.onload = (e) => { photoPreview = e.target.result; }; reader.readAsDataURL($event.target.files[0]); ">

                            <div class="mt-2">
                                <template x-if="photoPreview">
                                    <img :src="photoPreview" class="h-40 w-40 rounded-full object-cover">
                                </template>
                                <template x-if="!photoPreview">
                                    <div class="h-40 w-40 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center text-gray-500">
                                        Preview Foto
                                    </div>
                                </template>
                            </div>

                             <div class="mt-2 flex items-center gap-x-3">
                                <x-secondary-button type="button" @click="$refs.photo.click()">
                                    {{ __('Pilih Foto') }}
                                </x-secondary-button>
                                <span x-text="photoName" class="text-sm text-gray-600 dark:text-gray-400"></span>
                            </div>
                            <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Simpan') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
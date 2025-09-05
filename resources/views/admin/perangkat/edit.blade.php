<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Data Perangkat Kelurahan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('admin.perangkat.update', $perangkat) }}">
                        @csrf
                        @method('PATCH')
                        <div>
                            <x-input-label for="name" :value="__('Nama Lengkap')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $perangkat->name)" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="position" :value="__('Jabatan')" />
                            <x-text-input id="position" class="block mt-1 w-full" type="text" name="position" :value="old('position', $perangkat->position)" required />
                            <x-input-error :messages="$errors->get('position')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="photo_url" :value="__('URL Foto (Opsional)')" />
                            <x-text-input id="photo_url" class="block mt-1 w-full" type="text" name="photo_url" :value="old('photo_url', $perangkat->photo_url)" />
                            <x-input-error :messages="$errors->get('photo_url')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
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
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kelola Profil Kelurahan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if (session('success'))
                        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.profile.update') }}">
                        @csrf
                        @method('PATCH')

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

                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mt-6 mb-2">
                            Batas Wilayah
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <x-input-label for="north_boundary" :value="__('Utara')" />
                                <x-text-input id="north_boundary" class="block mt-1 w-full" type="text" name="north_boundary" :value="old('north_boundary', $profile->north_boundary ?? '')" required />
                                <x-input-error :messages="$errors->get('north_boundary')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="east_boundary" :value="__('Timur')" />
                                <x-text-input id="east_boundary" class="block mt-1 w-full" type="text" name="east_boundary" :value="old('east_boundary', $profile->east_boundary ?? '')" required />
                                <x-input-error :messages="$errors->get('east_boundary')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="south_boundary" :value="__('Selatan')" />
                                <x-text-input id="south_boundary" class="block mt-1 w-full" type="text" name="south_boundary" :value="old('south_boundary', $profile->south_boundary ?? '')" required />
                                <x-input-error :messages="$errors->get('south_boundary')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="west_boundary" :value="__('Barat')" />
                                <x-text-input id="west_boundary" class="block mt-1 w-full" type="text" name="west_boundary" :value="old('west_boundary', $profile->west_boundary ?? '')" required />
                                <x-input-error :messages="$errors->get('west_boundary')" class="mt-2" />
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
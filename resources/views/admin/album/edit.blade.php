<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Album Galeri') }}
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

                    <form method="POST" action="{{ route('admin.album.update', $album) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        
                        <div>
                            <x-input-label for="title" :value="__('Judul Album / Kegiatan')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $album->title)" required autofocus />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="date" :value="__('Tanggal Kegiatan')" />
                            <x-text-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date', $album->date)" required />
                            <x-input-error :messages="$errors->get('date')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Deskripsi Singkat (Opsional)')" />
                            <textarea id="description" name="description" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" rows="3">{{ old('description', $album->description) }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div class="mt-6">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Foto Saat Ini</h3>
                            <div class="mt-4 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                                @forelse ($album->photos as $photo)
                                    <div class="relative group">
                                        <img src="{{ asset('storage/' . $photo->path) }}" alt="Foto album" class="rounded-md w-full h-auto object-cover">
                                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-opacity duration-300 flex items-center justify-center">
                                            <form action="{{ route('admin.photo.destroy', $photo) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus foto ini?');" class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-3 rounded-full text-xs">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-gray-500 col-span-full">Belum ada foto di album ini.</p>
                                @endforelse
                            </div>
                        </div>

                        <div class="mt-6">
                            <x-input-label for="photos" :value="__('Tambah Foto Baru (Opsional)')" />
                            <input id="photos" name="photos[]" type="file" multiple class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 mt-1">
                            <x-input-error :messages="$errors->get('photos.*')" class="mt-2" />
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
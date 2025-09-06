@extends('layouts.public')

@section('title', 'Beranda - Kelurahan Kolakaasi')

@section('content')
    <section id="hero" class="relative h-[60vh] bg-cover bg-center flex items-center justify-center text-white" style="background-image: url('https://source.unsplash.com/random/1920x1080/?village,indonesia');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative z-10 text-center px-4">
            <h1 class="text-4xl md:text-6xl font-bold mb-4 drop-shadow-lg">Selamat Datang di Kelurahan Kolakaasi</h1>
            <p class="text-lg md:text-xl drop-shadow-md">Maju, Mandiri, dan Berbudaya</p>
        </div>
    </section>

    <section id="profil" class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-teal-700">Profil Singkat</h2>
                <p class="text-gray-600 mt-2">Mengenal Lebih Dekat Kelurahan Kolakaasi</p>
            </div>

            @if($profile)
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h3 class="text-2xl font-semibold mb-4">Visi & Misi</h3>
                    <p class="font-semibold text-gray-700">Visi:</p>
                    <p class="mb-4 italic">"{{ $profile->vision }}"</p>
                    <p class="font-semibold text-gray-700">Misi:</p>
                    <div class="prose max-w-none text-gray-600">{!! nl2br(e($profile->mission)) !!}</div>
                </div>
                <div>
                    <div class="bg-gray-100 p-6 rounded-lg shadow">
                        <h3 class="text-2xl font-semibold mb-4 border-b pb-2">Batas Wilayah</h3>
                        <ul class="space-y-3 text-gray-700">
                            <li><span class="font-bold w-16 inline-block">Utara:</span> {{ $profile->north_boundary }}</li>
                            <li><span class="font-bold w-16 inline-block">Timur:</span> {{ $profile->east_boundary }}</li>
                            <li><span class="font-bold w-16 inline-block">Selatan:</span> {{ $profile->south_boundary }}</li>
                            <li><span class="font-bold w-16 inline-block">Barat:</span> {{ $profile->west_boundary }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            @else
            <p class="text-center text-gray-500">Profil kelurahan belum tersedia.</p>
            @endif
        </div>
    </section>

    @if($profile)
    <section id="kependudukan" class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-teal-700">Data Kependudukan</h2>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center bg-white p-6 rounded-lg shadow">
                    <h3 class="text-4xl font-bold text-teal-600">{{ number_format($profile->population_total ?? 0) }}</h3>
                    <p class="mt-2 text-md font-medium text-gray-500">Total Penduduk</p>
                </div>
                <div class="text-center bg-white p-6 rounded-lg shadow">
                    <h3 class="text-4xl font-bold text-teal-600">{{ number_format($profile->household_count ?? 0) }}</h3>
                    <p class="mt-2 text-md font-medium text-gray-500">Kepala Keluarga</p>
                </div>
                <div class="text-center bg-white p-6 rounded-lg shadow">
                    <h3 class="text-4xl font-bold text-teal-600">{{ number_format($profile->population_male ?? 0) }}</h3>
                    <p class="mt-2 text-md font-medium text-gray-500">Laki-laki</p>
                </div>
                <div class="text-center bg-white p-6 rounded-lg shadow">
                    <h3 class="text-4xl font-bold text-teal-600">{{ number_format($profile->population_female ?? 0) }}</h3>
                    <p class="mt-2 text-md font-medium text-gray-500">Perempuan</p>
                </div>
            </div>
        </div>
    </section>
    @endif
    <section id="fasilitas" class="py-16">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-teal-700">Fasilitas Umum</h2>
                <p class="text-gray-600 mt-2">Sarana dan Prasarana Pendukung Masyarakat</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @forelse($facilities as $facility)
                <div class="bg-white p-6 rounded-lg shadow-md text-center hover:shadow-xl transition-shadow">
                    <h3 class="font-bold text-xl mb-2 text-teal-600">{{ $facility->name }}</h3>
                    <p class="text-sm text-gray-500 mb-2">({{ $facility->type }})</p>
                    <p class="text-gray-600">{{ $facility->address }}</p>
                </div>
                @empty
                <p class="text-center text-gray-500 col-span-full">Data fasilitas belum tersedia.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section id="pengumuman" class="py-16 bg-teal-50">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-16">
                <div>
                    <h2 class="text-3xl font-bold text-teal-700 mb-8">Pengumuman Terbaru</h2>
                    <div class="space-y-6">
                        @forelse($announcements as $announcement)
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h3 class="font-bold text-xl mb-2">{{ $announcement->title }}</h3>
                            <p class="text-gray-600 mb-3">{{ $Str::limit($announcement->content, 100) }}</p>
                            <div class="text-sm text-gray-400">
                                <span>{{ $Carbon::parse($announcement->created_at)->translatedFormat('d F Y') }}</span>
                            </div>
                        </div>
                        @empty
                        <p class="text-gray-500">Belum ada pengumuman terbaru.</p>
                        @endforelse
                    </div>
                </div>

                <div id="agenda">
                    <h2 class="text-3xl font-bold text-teal-700 mb-8">Agenda Kegiatan</h2>
                    <div class="space-y-4">
                        @forelse($agendas as $agenda)
                        <div class="flex items-center bg-white p-4 rounded-lg shadow-sm">
                            <div class="text-center border-r border-gray-200 pr-4 mr-4">
                                <p class="text-2xl font-bold text-teal-600">{{ $Carbon::parse($agenda->date)->format('d') }}</p>
                                <p class="text-sm text-gray-500">{{ $Carbon::parse($agenda->date)->format('M') }}</p>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg">{{ $agenda->title }}</h3>
                                <p class="text-sm text-gray-500">{{ $agenda->location }} | {{ $Carbon::parse($agenda->time)->format('H:i') }} WITA</p>
                            </div>
                        </div>
                        @empty
                        <p class="text-gray-500">Belum ada agenda kegiatan.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
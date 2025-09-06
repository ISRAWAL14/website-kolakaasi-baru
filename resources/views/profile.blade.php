@extends('layouts.public')

@section('title', 'Profil Lengkap - Kelurahan Kolakaasi')

@section('content')
<div class="bg-white py-16 sm:py-24">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">

        <div class="mx-auto max-w-3xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-800 sm:text-4xl">Profil Kelurahan Kolakaasi</h2>
            <p class="mt-4 text-lg leading-8 text-gray-600">Mengenal lebih dalam tentang sejarah, visi, misi, dan data wilayah Kelurahan Kolakaasi.</p>
        </div>

        @if($profile)
        <div class="mx-auto mt-16 space-y-20">
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-12 gap-y-16">
                <article>
                    <h3 class="text-2xl font-bold tracking-tight text-gray-800 border-l-4 border-teal-500 pl-4">
                        Sejarah Singkat
                    </h3>
                    <p class="mt-6 text-base leading-relaxed text-gray-600 text-justify">
                        {{ $profile->history }}
                    </p>
                </article>

                <article>
                    <h3 class="text-2xl font-bold tracking-tight text-gray-800 border-l-4 border-teal-500 pl-4">
                        Visi & Misi
                    </h3>
                    <div class="mt-6 space-y-6">
                        <div>
                            <p class="text-lg font-semibold text-gray-700">Visi:</p>
                            <blockquote class="mt-2 pl-4 border-l-2 border-gray-300">
                                <p class="italic text-base text-gray-600">
                                    "{{ $profile->vision }}"
                                </p>
                            </blockquote>
                        </div>
                        <div>
                            <p class="text-lg font-semibold text-gray-700">Misi:</p>
                            <div class="prose prose-sm max-w-none text-gray-600 mt-2">
                                {!! nl2br(e($profile->mission)) !!}
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            
            <div class="bg-gray-50 p-8 sm:p-12 rounded-2xl shadow-inner">
                <div class="grid grid-cols-1 xl:grid-cols-2 gap-16">
                    
                    <div>
                        <h3 class="text-2xl font-bold tracking-tight text-gray-800 text-center mb-8">Data Kependudukan</h3>
                        <div class="grid grid-cols-2 gap-6">
                            <div class="text-center bg-white p-4 rounded-lg shadow">
                                <p class="text-3xl font-bold text-gray-800">{{ number_format($profile->population_total ?? 0) }}</p>
                                <p class="mt-1 text-sm font-medium text-gray-500">Total Penduduk</p>
                            </div>
                            <div class="text-center bg-white p-4 rounded-lg shadow">
                                <p class="text-3xl font-bold text-gray-800">{{ number_format($profile->household_count ?? 0) }}</p>
                                <p class="mt-1 text-sm font-medium text-gray-500">Kepala Keluarga</p>
                            </div>
                            <div class="text-center bg-white p-4 rounded-lg shadow">
                                <p class="text-3xl font-bold text-gray-800">{{ number_format($profile->population_male ?? 0) }}</p>
                                <p class="mt-1 text-sm font-medium text-gray-500">Laki-laki</p>
                            </div>
                            <div class="text-center bg-white p-4 rounded-lg shadow">
                                <p class="text-3xl font-bold text-gray-800">{{ number_format($profile->population_female ?? 0) }}</p>
                                <p class="mt-1 text-sm font-medium text-gray-500">Perempuan</p>
                            </div>
                        </div>
                    </div>

                    <div>
                         <h3 class="text-2xl font-bold tracking-tight text-gray-800 text-center mb-8">Batas Wilayah</h3>
                         <div class="bg-white p-6 rounded-lg shadow">
                            <dl class="space-y-4 text-base">
                                <div class="flex justify-between border-b pb-2">
                                    <dt class="font-semibold text-gray-700">Utara:</dt>
                                    <dd class="text-gray-600 text-right">{{ $profile->north_boundary }}</dd>
                                </div>
                                <div class="flex justify-between border-b pb-2">
                                    <dt class="font-semibold text-gray-700">Timur:</dt>
                                    <dd class="text-gray-600 text-right">{{ $profile->east_boundary }}</dd>
                                </div>
                                <div class="flex justify-between border-b pb-2">
                                    <dt class="font-semibold text-gray-700">Selatan:</dt>
                                    <dd class="text-gray-600 text-right">{{ $profile->south_boundary }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="font-semibold text-gray-700">Barat:</dt>
                                    <dd class="text-gray-600 text-right">{{ $profile->west_boundary }}</dd>
                                </div>
                            </dl>
                         </div>
                    </div>

                </div>
            </div>

        </div>
        @else
        <p class="text-center text-gray-500 mt-16">Data profil tidak ditemukan.</p>
        @endif
    </div>
</div>
@endsection
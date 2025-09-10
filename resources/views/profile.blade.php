@extends('layouts.public')

@section('title', 'Profil Lengkap - Kelurahan Kolakaasi')

@section('content')
<div class="bg-white">
    <div class="mx-auto max-w-7xl px-6 lg:px-8 py-16 sm:py-24">
        
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
        </div>
        @else
        <p class="text-center text-gray-500 mt-16">Data profil belum diisi.</p>
        @endif
    </div>
</div>

@if($profile)
<div class="bg-gray-50 py-20 sm:py-28">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:max-w-none">
            <div class="text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Wilayah & Demografi</h2>
                <p class="mt-4 text-lg leading-8 text-gray-600">
                    Potret data wilayah dan kependudukan Kelurahan Kolakaasi.
                </p>
            </div>
            
            <dl class="mt-16 grid grid-cols-1 gap-x-8 gap-y-10 text-center sm:grid-cols-2 lg:grid-cols-4">
                <div class="flex flex-col rounded-lg bg-white p-6 shadow-md">
                    <dt class="text-base leading-7 text-gray-600">Luas Wilayah</dt>
                    <dd class="order-first text-5xl font-semibold tracking-tight text-teal-600">{{ $profile->luas_wilayah ?? 'N/A' }}</dd>
                </div>
                <div class="flex flex-col rounded-lg bg-white p-6 shadow-md">
                    <dt class="text-base leading-7 text-gray-600">Total Penduduk</dt>
                    <dd class="order-first text-5xl font-semibold tracking-tight text-teal-600">{{ number_format($profile->population_total ?? 0) }}</dd>
                </div>
                 <div class="flex flex-col rounded-lg bg-white p-6 shadow-md">
                    <dt class="text-base leading-7 text-gray-600">Jumlah RT</dt>
                    <dd class="order-first text-5xl font-semibold tracking-tight text-teal-600">{{ $profile->jumlah_rt ?? '0' }}</dd>
                </div>
                <div class="flex flex-col rounded-lg bg-white p-6 shadow-md">
                    <dt class="text-base leading-7 text-gray-600">Jumlah RW</dt>
                    <dd class="order-first text-5xl font-semibold tracking-tight text-teal-600">{{ $profile->jumlah_rw ?? '0' }}</dd>
                </div>
            </dl>

            <hr class="my-16 border-gray-200">

            <div class="grid grid-cols-1 gap-12 lg:grid-cols-2">
                <div class="rounded-lg bg-white p-6 shadow-md">
                    <h3 class="text-xl font-bold text-center text-gray-800">Komposisi Penduduk Berdasarkan Usia</h3>
                    <div class="mt-6">
                        <canvas id="ageChart"></canvas>
                    </div>
                </div>
                <div class="rounded-lg bg-white p-6 shadow-md">
                     <h3 class="text-xl font-bold text-center text-gray-800">Komposisi Penduduk Berdasarkan Mata Pencaharian</h3>
                    <div class="mt-6">
                        <canvas id="occupationChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@push('scripts')
<script>
    window.profileData = {{ Js::from($profile) }};
</script>
@endpush
@endsection
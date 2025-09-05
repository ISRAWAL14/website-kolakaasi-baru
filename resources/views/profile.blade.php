@extends('layouts.public')

@section('title', 'Profil Lengkap - Kelurahan Kolakaasi')

@section('content')
<div class="bg-white py-16 sm:py-24">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:mx-0">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Profil Kelurahan Kolakaasi</h2>
            <p class="mt-6 text-lg leading-8 text-gray-600">Mengenal lebih dalam tentang sejarah, visi, misi, dan wilayah administratif Kelurahan Kolakaasi.</p>
        </div>

        @if($profile)
        <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 lg:mx-0 lg:max-w-none lg:grid-cols-2">
            <article class="flex max-w-xl flex-col items-start justify-between">
                <div class="group relative">
                    <h3 class="mt-3 text-2xl font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                        Sejarah Singkat
                    </h3>
                    <p class="mt-5 text-base leading-7 text-gray-600">{{ $profile->history }}</p>
                </div>
            </article>

            <article class="flex max-w-xl flex-col items-start justify-between">
                <div class="group relative">
                    <h3 class="mt-3 text-2xl font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                        Visi & Misi
                    </h3>
                    <p class="mt-5 text-base leading-7 font-semibold text-gray-600">Visi:</p>
                    <p class="italic text-base leading-7 text-gray-600">"{{ $profile->vision }}"</p>

                    <p class="mt-5 text-base leading-7 font-semibold text-gray-600">Misi:</p>
                    <div class="prose max-w-none text-base leading-7 text-gray-600">{!! nl2br(e($profile->mission)) !!}</div>
                </div>
            </article>
        </div>
        @else
        <p class="text-center text-gray-500 mt-16">Data profil tidak ditemukan.</p>
        @endif
    </div>
</div>
@endsection
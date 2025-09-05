@extends('layouts.public')

@section('title', 'Kontak - Kelurahan Kolakaasi')

@section('content')
<div class="bg-white py-16 sm:py-24">
    <div class="mx-auto max-w-2xl px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Hubungi Kami</h2>
            <p class="mt-6 text-lg leading-8 text-gray-600">Silakan hubungi kami melalui alamat dan kontak yang tersedia atau kunjungi langsung kantor kami.</p>
        </div>

        @if ($contact)
        <div class="space-y-16">
            <div>
                <h3 class="text-2xl font-bold tracking-tight text-gray-900 mb-8 text-center">Informasi Kontak</h3>
                <div class="space-y-6 text-base leading-7 text-gray-600">
                    <div class="flex gap-x-4">
                        <dt class="flex-none pt-1">
                            <span class="sr-only">Alamat</span>
                            <svg class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                            </svg>
                        </dt>
                        <dd>{{ $contact->address }}</dd>
                    </div>
                    <div class="flex gap-x-4">
                        <dt class="flex-none pt-1">
                            <span class="sr-only">Telepon</span>
                            <svg class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                            </svg>
                        </dt>
                        <dd><a class="hover:text-gray-900" href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a></dd>
                    </div>
                    <div class="flex gap-x-4">
                        <dt class="flex-none pt-1">
                            <span class="sr-only">Email</span>
                            <svg class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg>
                        </dt>
                        <dd><a class="hover:text-gray-900" href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></dd>
                    </div>
                </div>
            </div>

            <div class="w-full h-96 rounded-lg shadow-md overflow-hidden">
                 {!! str_replace('width="600"', 'width="100%"', $contact->google_maps_link) !!}
            </div>
        </div>
        @else
        <p class="text-center text-gray-500 mt-16">Data kontak tidak ditemukan.</p>
        @endif
    </div>
</div>
@endsection
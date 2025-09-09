<!-- Ganti link ini -->
<x-nav-link :href="route('admin.galeri.index')" :active="request()->routeIs('admin.galeri.*')">
    {{ __('Kelola Galeri') }}
</x-nav-link>

<!-- Menjadi seperti ini -->
<x-nav-link :href="route('admin.album.index')" :active="request()->routeIs('admin.album.*')">
    {{ __('Kelola Album') }}
</x-nav-link>
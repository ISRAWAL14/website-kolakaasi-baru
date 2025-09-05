<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
        {{ __('Dashboard') }}
    </x-nav-link>

    <x-nav-link :href="route('admin.profile.edit')" :active="request()->routeIs('admin.profile.edit')">
        {{ __('Kelola Profil') }}
    </x-nav-link>

    <x-nav-link :href="route('admin.perangkat.index')" :active="request()->routeIs('admin.perangkat.*')">
        {{ __('Kelola Perangkat') }}
    </x-nav-link>
</div>
<div class="h-full p-4 bg-violet-dark text-blanc-matte border-r border-violet-light font-semibold">
    <nav class="space-y-2">
        <x-sidebar-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
            Dashboard
        </x-sidebar-link>

        <x-sidebar-link href="{{ route('profile.edit') }}" :active="request()->routeIs('profile.edit')">
            Profile
        </x-sidebar-link>

        <x-sidebar-link href="#" :active="request()->routeIs('settings')">
            Settings
        </x-sidebar-link>
    </nav>
</div>

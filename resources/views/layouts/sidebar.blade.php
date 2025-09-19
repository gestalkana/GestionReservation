<div class="d-flex flex-column p-3 vh-100 sticky-top shadow"
     style="width: 250px; 
            background: linear-gradient(180deg, #2a1d47, #4b367c);
            color: #d8cfff;
            border-right: 1px solid rgba(255, 255, 255, 0.1);">

    {{-- Infos utilisateur --}}
    @php
        $user = Auth::user();
        $names = explode(' ', $user->name);
        $initials = '';
        foreach ($names as $namePart) {
            $initials .= strtoupper(substr($namePart, 0, 1));
        }
        $initials = substr($initials, 0, 2);
    @endphp

    <!-- Profil utilisateur -->
    <div class="d-flex align-items-center mb-4 pb-3 border-bottom border-secondary">
        @if ($user->profile_photo_url)
            <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" 
                 class="rounded-circle me-2 shadow-sm border border-light" width="40" height="40">
        @else
            <div class="rounded-circle bg-gradient d-flex justify-content-center align-items-center me-2 shadow-sm"
                 style="width: 40px; height: 40px; font-weight: 600; font-size: 1rem;
                        background: radial-gradient(circle, #b49bff, #8a78b0); color: #2a1d47;">
                {{ $initials }}
            </div>
        @endif
        <div class="small">
            <div class="fw-bold" style="color: #d8cfff;">{{ $user->name }}</div>
            <small class="fw-semibold" style="color: #8affc1;">● Actif</small>
        </div>
    </div>

   <!-- Navigation -->
<nav class="nav nav-pills flex-column gap-2 mb-auto">
    <x-sidebar-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
        <i class="bi bi-speedometer2 me-2 sidebar-icon"></i> Dashboard
    </x-sidebar-link>

    <x-sidebar-link href="{{ route('planning') }}" :active="request()->routeIs('planning')">
        <i class="bi bi-calendar-week me-2 sidebar-icon"></i> Planning
    </x-sidebar-link>

    <x-sidebar-link href="{{ route('profile.edit') }}" :active="request()->routeIs('profile.edit')">
        <i class="bi bi-person-circle me-2 sidebar-icon"></i> Profile
    </x-sidebar-link>

    <x-sidebar-link href="{{-- route('settings') --}}" :active="request()->routeIs('settings')">
        <i class="bi bi-gear me-2 sidebar-icon"></i> Settings
    </x-sidebar-link>
</nav>




    <!-- Logout en bas -->
    <div class="mt-3 pt-3 border-top border-secondary">
        <a href="#" class="nav-link fw-semibold d-flex align-items-center"
           style="color:#ff6b6b;"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="bi bi-box-arrow-right me-2"></i> Logout
        </a>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>

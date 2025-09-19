{{-- resources/views/profile/edit.blade.php --}}
<x-app-layout>
    @section('title', 'Mon Profil')

    <x-slot name="header">
        <h2 class="h4 fw-bold mb-0 text-dark">
            {{ __('Mon Profil') }}
        </h2>
    </x-slot>

    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <!-- Carte Profil -->
                <div class="card shadow-lg border-0 rounded-3">
                    <div class="card-header" 
                         style="background: linear-gradient(90deg, #2a1d47, #4b367c); color: #d8cfff;">
                        <h5 class="mb-0">Modifier mes informations</h5>
                    </div>
                    <div class="card-body p-4">

                        <!-- Photo de profil -->
                        <div class="text-center mb-4">
                            @if (Auth::user()->profile_photo_url)
                                <img src="{{ Auth::user()->profile_photo_url }}" 
                                     alt="{{ Auth::user()->name }}" 
                                     class="rounded-circle shadow-sm border border-light"
                                     style="width: 90px; height: 90px; object-fit: cover;">
                            @else
                                <div class="rounded-circle d-flex justify-content-center align-items-center shadow-sm"
                                     style="width: 90px; height: 90px; font-size: 1.8rem; font-weight: 600;
                                            background: radial-gradient(circle, #b49bff, #8a78b0); color:#fff;">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                                </div>
                            @endif
                            <p class="mt-2 mb-0 fw-semibold">{{ Auth::user()->name }}</p>
                            <small class="text-muted">{{ Auth::user()->email }}</small>
                        </div>

                        <!-- Formulaire -->
                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            @method('PATCH')

                            <div class="mb-3">
                                <label for="name" class="form-label fw-semibold">Nom</label>
                                <input id="name" type="text" 
                                       class="form-control @error('name') is-invalid @enderror" 
                                       name="name" value="{{ old('name', Auth::user()->name) }}" required autofocus>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">Email</label>
                                <input id="email" type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       name="email" value="{{ old('email', Auth::user()->email) }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <hr>

                            <div class="mb-3">
                                <label for="password" class="form-label fw-semibold">Nouveau mot de passe</label>
                                <input id="password" type="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       name="password" autocomplete="new-password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Laissez vide si vous ne souhaitez pas le changer.</small>
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label fw-semibold">Confirmer le mot de passe</label>
                                <input id="password_confirmation" type="password" 
                                       class="form-control" 
                                       name="password_confirmation" autocomplete="new-password">
                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn fw-semibold text-white"
                                        style="background: linear-gradient(90deg, #4b367c, #2a1d47);">
                                    Sauvegarder
                                </button>
                                <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
                                    Annuler
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

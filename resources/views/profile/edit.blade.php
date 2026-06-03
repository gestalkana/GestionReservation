<x-app-layout>
    @section('title', 'Mon Profil')

    <x-slot name="header">
        <h2 class="h5 fw-bold text-dark mb-0">
            <i class="bi bi-person-circle me-1 text-primary"></i> Mon Profil
        </h2>
    </x-slot>

    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-10">

                <!-- Carte Profil Compacte -->
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-header py-2 px-3 text-white rounded-top-4"
                         style="background: linear-gradient(90deg, #2a1d47, #4b367c);">
                        <small class="fw-semibold">
                            <i class="bi bi-pencil-square me-1"></i> Modifier mes informations
                        </small>
                    </div>
                    <div class="card-body py-3 px-3">

                        <!-- Avatar ou Initiales -->
                       <div class="d-flex align-items-center gap-3 mb-3">
                            @if (Auth::user()->profile_photo_url)
                                <img src="{{ Auth::user()->profile_photo_url }}" 
                                     alt="{{ Auth::user()->name }}" 
                                     class="rounded-circle shadow-sm"
                                     style="width: 64px; height: 64px; object-fit: cover;">
                            @else
                                <div class="rounded-circle d-flex justify-content-center align-items-center shadow-sm"
                                     style="width: 64px; height: 64px; font-size: 1.3rem; font-weight: 600;
                                            background: radial-gradient(circle, #b49bff, #8a78b0); color:#fff;">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                                </div>
                            @endif

                            <div>
                                <div class="fw-semibold">{{ Auth::user()->name }}</div>
                                <div class="small text-muted">{{ Auth::user()->email }}</div>
                            </div>
                        </div>

                        <!-- Formulaire -->
                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            @method('PATCH')

                            <div class="mb-2">
                                <label for="name" class="form-label small text-muted">Nom</label>
                                <input id="name" type="text" 
                                       class="form-control form-control-sm @error('name') is-invalid @enderror" 
                                       name="name" value="{{ old('name', Auth::user()->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label for="email" class="form-label small text-muted">Email</label>
                                <input id="email" type="email" 
                                       class="form-control form-control-sm @error('email') is-invalid @enderror" 
                                       name="email" value="{{ old('email', Auth::user()->email) }}" required>
                                @error('email')
                                    <div class="invalid-feedback small">{{ $message }}</div>
                                @enderror
                            </div>

                            <hr class="my-3">

                            <div class="mb-2">
                                <label for="password" class="form-label small text-muted">Nouveau mot de passe</label>
                                <input id="password" type="password" 
                                       class="form-control form-control-sm @error('password') is-invalid @enderror" 
                                       name="password" autocomplete="new-password">
                                @error('password')
                                    <div class="invalid-feedback small">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Laissez vide si inchangé.</small>
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label small text-muted">Confirmer</label>
                                <input id="password_confirmation" type="password" 
                                       class="form-control form-control-sm" 
                                       name="password_confirmation" autocomplete="new-password">
                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('dashboard') }}" class="btn btn-sm btn-outline-secondary">
                                    Annuler
                                </a>
                                <button type="submit" class="btn btn-sm text-white fw-semibold"
                                        style="background: linear-gradient(90deg, #4b367c, #2a1d47);">
                                    Sauvegarder
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    @section('title', 'Détails du client')

    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center py-1">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-person-vcard-fill text-primary"></i>
                <span class="fw-semibold">Détails du client</span>
            </div>

            <div class="d-flex gap-2">
                <button
                    class="btn btn-warning"
                    data-bs-toggle="modal"
                    data-bs-target="#editClientModal{{ $client->id }}">
                    <i class="bi bi-pencil me-1"></i>
                    Modifier
                </button>

                @include('clients.edit')

                <a href="{{ route('clients.index') }}"
                   class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-arrow-left me-1"></i>
                    Retour
                </a>
            </div>
        </div>
    </x-slot>

    <div class="container-fluid py-3">

        <div class="card border-0 shadow-sm">

            <div class="card-body">

                <div class="row">

                    <!-- Photo -->
                    <div class="col-md-3 text-center border-end">
                       

                        @if($client->photo)
                            <img
                                src="{{ asset('storage/' . $client->photo) }}"
                                alt="{{ $client->nom }}"
                                class="img-fluid rounded-circle shadow-sm mb-3"
                                style="width:180px;height:180px;object-fit:cover;"
                            >
                        @else
                            <div class="mb-3">
                                <i class="bi bi-person-circle text-secondary"
                                   style="font-size: 8rem;"></i>
                            </div>
                        @endif

                        <h5 class="fw-bold mb-1">
                            {{ $client->nom }}
                            {{ $client->prenom }}
                        </h5>

                        <small class="text-muted">
                            Client #{{ $client->id }}
                        </small>
                         <!-- Bouton modifier photo -->
                        <button
                            class="btn btn-sm btn-outline-primary mt-2"
                            data-bs-toggle="modal"
                            data-bs-target="#editPhotoModal{{ $client->id }}">
                            <i class="bi bi-camera me-1"></i>
                            Modifier la photo
                        </button>

                        @include('clients.edit-photo')

                    </div>

                    <!-- Informations -->
                    <div class="col-md-9">

                        <h6 class="fw-bold border-bottom pb-2 mb-3">
                            Informations personnelles
                        </h6>

                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="text-muted small">Nom</label>
                                <div class="fw-semibold">
                                    {{ $client->nom }}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="text-muted small">Prénom</label>
                                <div class="fw-semibold">
                                    {{ $client->prenom ?: '-' }}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="text-muted small">
                                    Date de naissance
                                </label>
                                <div class="fw-semibold">
                                    {{ \Carbon\Carbon::parse($client->date_naissance)->format('d/m/Y') }}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="text-muted small">
                                    Âge
                                </label>
                                <div class="fw-semibold">
                                    {{ \Carbon\Carbon::parse($client->date_naissance)->age }}
                                    ans
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="text-muted small">
                                    Téléphone
                                </label>
                                <div class="fw-semibold">
                                    {{ $client->telephone ?: '-' }}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="text-muted small">
                                    Email
                                </label>
                                <div class="fw-semibold">
                                    {{ $client->email ?: '-' }}
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="text-muted small">
                                    Adresse
                                </label>
                                <div class="fw-semibold">
                                    {{ $client->adresse ?: '-' }}
                                </div>
                            </div>

                        </div>

                        <hr>

                        <h6 class="fw-bold border-bottom pb-2 mb-3">
                            Informations système
                        </h6>

                        <div class="row">

                            <div class="col-md-6">
                                <label class="text-muted small">
                                    Créé le
                                </label>
                                <div>
                                    {{ $client->created_at->format('d/m/Y H:i') }}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="text-muted small">
                                    Dernière modification
                                </label>
                                <div>
                                    {{ $client->updated_at->format('d/m/Y H:i') }}
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
</x-app-layout>

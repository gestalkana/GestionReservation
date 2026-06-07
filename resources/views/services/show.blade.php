<x-app-layout>
    @section('title', 'Détails du service')

    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center py-1">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-eye text-info"></i>
                <span class="fw-semibold">Détails du service</span>
            </div>

            <div>
                <!-- <a href="{{ route('services.edit', $service) }}"
                   class="btn btn-warning btn-sm">
                    <i class="bi bi-pencil me-1"></i>
                    Modifier
                </a> -->
                 <button type="button"
                        class="btn btn-warning btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#editServiceModal{{ $service->id }}">
                    <i class="bi bi-pencil me-1"></i> Modifier
                </button>
                @include('services.edit')

                <a href="{{ route('services.index') }}"
                   class="btn btn-secondary btn-sm">
                    <i class="bi bi-arrow-left me-1"></i>
                    Retour
                </a>
            </div>
        </div>
    </x-slot>

    <div class="container-fluid py-3">

        <div class="card border-0 shadow-sm">

            <div class="card-header bg-light">
                <h5 class="mb-0">
                    {{ $service->nom }}
                </h5>
            </div>

            <div class="card-body">

                <div class="row mb-3">
                    <div class="col-md-3 fw-semibold">
                        Nom :
                    </div>
                    <div class="col-md-9">
                        {{ $service->nom }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3 fw-semibold">
                        Type de service :
                    </div>
                    <div class="col-md-9">
                        {{ $service->service_types?->nom ?? 'Non défini' }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3 fw-semibold">
                        Description :
                    </div>
                    <div class="col-md-9">
                        {{ $service->description ?? 'Aucune description' }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3 fw-semibold">
                        Créé le :
                    </div>
                    <div class="col-md-9">
                        {{ $service->created_at->format('d/m/Y H:i') }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 fw-semibold">
                        Dernière modification :
                    </div>
                    <div class="col-md-9">
                        {{ $service->updated_at->format('d/m/Y H:i') }}
                    </div>
                </div>

            </div>

            <div class="card-footer bg-white text-end">

                <form action="{{ route('services.destroy', $service) }}"
                      method="POST"
                      class="d-inline"
                      onsubmit="return confirm('Supprimer ce service ?')">

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="bi bi-trash me-1"></i>
                        Supprimer
                    </button>

                </form>

            </div>

        </div>

    </div>
</x-app-layout>
<x-app-layout>
    @section('title', 'Nouveau client')

    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center py-1">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-person-plus-fill text-primary"></i>
                <span class="fw-semibold">Ajouter un client</span>
            </div>

            <a href="{{ route('clients.index') }}" class="btn btn-sm btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i>
                Retour
            </a>
        </div>
    </x-slot>

    <div class="container-fluid py-2">

        <div class="card border-0 shadow-sm">
            <div class="card-body">

                <form action="{{ route('clients.store') }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">Nom <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                                   name="nom"
                                   class="form-control @error('nom') is-invalid @enderror"
                                   value="{{ old('nom') }}"
                                   required>

                            @error('nom')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Prénom</label>
                            <input type="text"
                                   name="prenom"
                                   class="form-control @error('prenom') is-invalid @enderror"
                                   value="{{ old('prenom') }}">

                            @error('prenom')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Date de naissance <span class="text-danger">*</span></label>
                            <input type="date"
                                   name="date_naissance"
                                   class="form-control @error('date_naissance') is-invalid @enderror"
                                   value="{{ old('date_naissance') }}"
                                   required>

                            @error('date_naissance')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Téléphone</label>
                            <input type="text"
                                   name="telephone"
                                   class="form-control @error('telephone') is-invalid @enderror"
                                   value="{{ old('telephone') }}">

                            @error('telephone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email"
                                   name="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}">

                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Photo</label>
                            <input type="file"
                                   name="photo"
                                   class="form-control @error('photo') is-invalid @enderror"
                                   accept="image/*">

                            @error('photo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Adresse</label>
                            <textarea name="adresse"
                                      rows="3"
                                      class="form-control @error('adresse') is-invalid @enderror">{{ old('adresse') }}</textarea>

                            @error('adresse')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <hr>

                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('clients.index') }}"
                                   class="btn btn-light">
                                    Annuler
                                </a>

                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-lg me-1"></i>
                                    Enregistrer
                                </button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>

    </div>
</x-app-layout>
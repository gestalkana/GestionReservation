<x-app-layout>
    @section('title', 'Ajouter un service')

    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center py-1">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-plus-circle me-2 text-primary"></i>
                <span class="fw-semibold">Ajouter un service</span>
            </div>

            <a href="{{ route('services.index') }}" class="btn btn-sm btn-secondary">
                <i class="bi bi-arrow-left me-1"></i>
                Retour
            </a>
        </div>
    </x-slot>

    <div class="container-fluid py-3">

        <div class="card border-0 shadow-sm">
            <div class="card-body">

                <form action="{{ route('services.store') }}" method="POST">
                    @csrf

                    <!-- Type de service -->
                    <div class="mb-3">
                        <label for="service_type_id" class="form-label">
                            Type de service <span class="text-danger">*</span>
                        </label>

                        <select name="service_type_id"
                                id="service_type_id"
                                class="form-select @error('service_type_id') is-invalid @enderror"
                                required>
                            <option value="">-- Sélectionner un type --</option>

                            @foreach($service_types as $service_type)
                                <option value="{{ $service_type->id }}"
                                    {{ old('service_type_id') == $service_type->id ? 'selected' : '' }}>
                                    {{ $service_type->nom }}
                                </option>
                            @endforeach
                        </select>

                        @error('service_type_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Nom -->
                    <div class="mb-3">
                        <label for="nom" class="form-label">
                            Nom du service <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                               name="nom"
                               id="nom"
                               class="form-control @error('nom') is-invalid @enderror"
                               value="{{ old('nom') }}"
                               required>

                        @error('nom')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">
                            Description
                        </label>

                        <textarea name="description"
                                  id="description"
                                  rows="4"
                                  class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>

                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Boutons -->
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('services.index') }}" class="btn btn-secondary">
                            Annuler
                        </a>

                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i>
                            Enregistrer
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</x-app-layout>
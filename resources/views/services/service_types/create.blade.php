<x-app-layout>
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Créer un type de service</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('services.service_types.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nom" class="form-label">
                            Nom <span class="text-danger">*</span>
                        </label>

                        <input
                            type="text"
                            name="nom"
                            id="nom"
                            value="{{ old('nom') }}"
                            class="form-control @error('nom') is-invalid @enderror"
                            required
                        >

                        @error('nom')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="code" class="form-label">
                            Code
                        </label>

                        <input
                            type="text"
                            name="code"
                            id="code"
                            value="{{ old('code') }}"
                            class="form-control @error('code') is-invalid @enderror"
                        >

                        @error('code')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            Enregistrer
                        </button>

                        <a href="{{ route('services.index') }}"
                           class="btn btn-secondary">
                            Annuler
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
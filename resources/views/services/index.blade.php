<x-app-layout>
    @section('title', 'services')

    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center py-1">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-box-seam me-2 sidebar-icon text-primary"></i>
                <span class="fw-semibold">Services</span>
            </div>

            <a href="{{ route('clients.create') }}" class="btn btn-sm btn-primary">
                <i class="bi bi-plus-lg me-1"></i>
                Ajouter
            </a>
        </div>
    </x-slot>

    <div class="container-fluid py-2">


        <!-- Table card minimal -->
        <div class="card border-0 shadow-sm">

            <div class="table-responsive">
                <table class="table table-hover table-sm align-middle mb-0">

                    <thead class="table-light">
                        <tr class="text-uppercase small text-muted">
                            <th>#</th>
                            <th>Nom</th>
                            <th class="d-none d-md-table-cell">Description</th>
                            <th class="d-none d-md-table-cell">type</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($services as $service)
                            <tr>
                                <td class="text-muted small">{{ $loop->iteration }}</td>

                                <td class="fw-semibold">
                                    {{ $service->nom }}
                                </td>

                                <td class="d-none d-md-table-cell small text-muted">
                                    {{ \Illuminate\Support\Str::limit($service->description, 30, '...') }}
                                </td>

                                <td class="d-none d-md-table-cell small text-muted">               
                                    {{ $service->service_types ? $service->service_types->nom  : 'service inconnu' }}
                                </td>

                                <td class="text-end">
                                    <div class="btn-group btn-group-sm">

                                        <a href="{{ route('services.show', $service) }}"
                                           class="btn btn-outline-info"
                                           title="Voir">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        <a href="{{ route('services.edit', $service) }}"
                                           class="btn btn-outline-warning"
                                           title="Modifier">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <form action="{{ route('services.destroy', $service) }}"
                                              method="POST"
                                              onsubmit="return confirm('Supprimer ce service ?')">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-outline-danger" title="Supprimer">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">
                                    <i class="bi bi-inbox d-block fs-4 mb-1"></i>
                                    Aucun service
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>

        @if(method_exists($services, 'links'))
            <div class="mt-2 small">
                {{ $services->links() }}
            </div>
        @endif

    </div>
</x-app-layout>
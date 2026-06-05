<x-app-layout>
    @section('title', 'Clients')

    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center py-1">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-people-fill text-primary"></i>
                <span class="fw-semibold">Clients</span>
            </div>

            <a href="{{ route('clients.create') }}" class="btn btn-sm btn-primary">
                <i class="bi bi-plus-lg me-1"></i>
                Ajouter
            </a>
        </div>
    </x-slot>

    <div class="container-fluid py-2">

        <!-- Search compact -->
        <div class="mb-2">
            <form method="GET" action="{{ route('clients.index') }}">
                <div class="input-group input-group-sm shadow-sm">
                    <span class="input-group-text bg-white">
                        <i class="bi bi-search"></i>
                    </span>

                    <input
                        type="text"
                        name="search"
                        class="form-control border-start-0"
                        placeholder="Rechercher..."
                        value="{{ request('search') }}"
                    >

                    @if(request('search'))
                        <a href="{{ route('clients.index') }}" class="btn btn-light border">
                            <i class="bi bi-x-lg"></i>
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <!-- Table card minimal -->
        <div class="card border-0 shadow-sm">

            <div class="table-responsive">
                <table class="table table-hover table-sm align-middle mb-0">

                    <thead class="table-light">
                        <tr class="text-uppercase small text-muted">
                            <th>#</th>
                            <th>Nom</th>
                            <th class="d-none d-md-table-cell">Téléphone</th>
                            <th class="d-none d-md-table-cell">Email</th>
                            <th class="d-none d-lg-table-cell">Adresse</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($clients as $client)
                            <tr>
                                <td class="text-muted small">
                                    {{ ($clients->currentPage() - 1) * $clients->perPage() + $loop->iteration }}</td>

                                <td class="fw-semibold">
                                    {{ $client->nom }}
                                </td>

                                <td class="d-none d-md-table-cell small text-muted">
                                    {{ $client->telephone }}
                                </td>

                                <td class="d-none d-md-table-cell small text-muted">
                                    {{ $client->email }}
                                </td>

                                <td class="d-none d-lg-table-cell small text-muted">
                                    {{ $client->adresse }}
                                </td>

                                <td class="text-end">
                                    <div class="btn-group btn-group-sm">

                                        <a href="{{ route('clients.show', $client) }}"
                                           class="btn btn-outline-info"
                                           title="Voir">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        <button
                                            type="button"
                                            class="btn btn-outline-warning"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editClientModal{{ $client->id }}">
                                            <i class="bi bi-pencil"></i>
                                        </button>

                                        @include('clients.edit')

                                        <form action="{{ route('clients.destroy', $client) }}"
                                              method="POST"
                                              onsubmit="return confirm('Supprimer ce client ?')">
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
                                    Aucun client
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>

        @if(method_exists($clients, 'links'))
            <div class="mt-2 small">
                {{ $clients->links() }}
            </div>
        @endif

    </div>
</x-app-layout>
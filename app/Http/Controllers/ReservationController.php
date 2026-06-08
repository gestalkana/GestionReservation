<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Client;
use App\Models\Service;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $reservations = Reservation::with(['client', 'service'])
            ->when($search, function ($query) use ($search) {
                $query->whereHas('client', function ($q) use ($search) {
                    $q->where('nom', 'like', "%{$search}%");
                })
                ->orWhereHas('service', function ($q) use ($search) {
                    $q->where('nom', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10);
        $clients = Client::All();
        $services = Service::All();

        return view('reservations.index', compact('reservations', 'clients', 'services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::All();
        $services = Service::All();

        return view('reservations.create', compact('clients', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'service_id' => 'required|exists:services,id',
            'reservation_date' => 'required|date',
            'status' => 'required|in:en_attente,confirmee,annulee,terminee',
            'note' => 'nullable|string',
        ]);

        Reservation::create([
            'client_id' => $request->client_id,
            'service_id' => $request->service_id,
            'reservation_date' => $request->reservation_date,
            'status' => $request->status,
            'note' => $request->note,
        ]);

        return redirect()
            ->route('reservations.index')
            ->with('success', 'Réservation créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        $clients = Client::all();
        $services = Service::all();

        return view('reservations.show', compact('reservation', 'clients', 'services'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'service_id' => 'required|exists:services,id',
            'reservation_date' => 'required|date',
            'status' => 'required|in:en_attente,confirmee,annulee,terminee',
            'note' => 'nullable|string',
        ]);

        $reservation->update([
            'client_id' => $request->client_id,
            'service_id' => $request->service_id,
            'reservation_date' => $request->reservation_date,
            'status' => $request->status,
            'note' => $request->note,
        ]);

        return redirect()
            ->route('reservations.index')
            ->with('success', 'Réservation mise à jour avec succès.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('reservations.index');
    }
}

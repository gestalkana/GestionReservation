<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanningController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with(['client', 'service'])->get();

        $events = $reservations->map(function ($reservation) {

            return [
                'id' => $reservation->id,
                'title' => $reservation->client->nom . ' - ' . $reservation->service->nom,
                'start' => $reservation->reservation_date,
                'color' => match ($reservation->status) {
                    'confirmee' => '#198754',
                    'en_attente' => '#ffc107',
                    'annulee' => '#dc3545',
                    'terminee' => '#0d6efd',
                    default => '#6c757d',
                }
            ];
        });

        return view('planning.index', [
            'events' => $events
        ]);
}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service_types;

class ServiceTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       //
    }

    /**
     * Show the form for creating a new resource.
     */
     public function create(Service_types $service_types)
    {
        return view('services.service_types.create', compact('service_types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
            'nom'             => ['required', 'string', 'max:255'],
            'code'     => ['nullable', 'string'],
        ]);

        Service_types::create($validated);

        return redirect()
            ->route('services.index')
            ->with('success', 'Service types crée avec succès.');
    }

}

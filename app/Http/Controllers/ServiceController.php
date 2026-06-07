<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Service_types;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Recupère la liste de tous les services ainsi que ces types
        $services = Service::with('Service_types')->get();
        $service_types = Service_types::All();

        return view('services.index', compact('services', 'service_types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $service_types = Service_types::All();
        return view('services.create', compact('service_types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
            'service_type_id' => ['required', 'exists:service_types,id'],
            'nom'             => ['required', 'string', 'max:255'],
            'description'     => ['nullable', 'string'],
        ]);

        Service::create($validated);

        return redirect()
            ->route('services.index')
            ->with('success', 'Service crée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        $service->load('service_types');
        $service_types = Service_types::All();

        return view('services.show', compact('service', 'service_types'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'service_type_id' => ['required', 'exists:service_types,id'],
            'nom'             => ['required', 'string', 'max:255'],
            'description'     => ['nullable', 'string'],
        ]);

        $service->update($validated);

        return redirect()
            ->route('services.index')
            ->with('success', 'Service modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('services.index');
    }
}

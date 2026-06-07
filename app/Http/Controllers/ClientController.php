<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::paginate(4);
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Client $clients)
    {
        return view('clients.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'nullable|string|max:255',
            'date_naissance' => 'required|date',
            'email' => 'nullable|email|unique:clients,email',
            'telephone' => 'nullable|string|unique:clients,telephone',
            'adresse' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request
                ->file('photo')
                ->store('clients', 'public');
        }

        Client::create($validated);

        return redirect()
            ->route('clients.index')
            ->with('success', 'Client créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'nullable|string|max:255',
            'date_naissance' => 'required|date',
            'email' => 'nullable|email|unique:clients,email,' . $client->id,
            'telephone' => 'nullable|string|unique:clients,telephone,' . $client->id,
            'adresse' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {

            if ($client->photo && Storage::disk('public')->exists($client->photo)) {
                Storage::disk('public')->delete($client->photo);
            }

            $validated['photo'] = $request
                ->file('photo')
                ->store('clients', 'public');
        }

        $client->update($validated);

        return back()->with('success', 'Client modifié avec succès.');
    }
    

    public function updatePhoto(Request $request, Client $client)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('photo')) {

            // supprimer ancienne photo si existe
            if ($client->photo && Storage::disk('public')->exists($client->photo)) {
                Storage::disk('public')->delete($client->photo);
            }

            $path = $request->file('photo')->store('clients', 'public');

            $client->update([
                'photo' => $path
            ]);
        }

        return back()->with('success', 'Photo mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index');
    }
}

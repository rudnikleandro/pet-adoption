<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\VeterinaryInfo;
use App\Models\Temperament;
use App\Models\EnergyLevel;
use App\Models\AnimalRelationship;
use App\Models\AnimalPhoto;
use Illuminate\Support\Facades\Storage;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animals = Animal::with('shelter', 'photos', 'veterinaryInfo', 'temperament', 'energyLevel', 'animalRelationship')->get();
        return view('admin.animals.index', compact('animals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $shelters = \App\Models\Shelter::all();
        return view('admin.animals.create', compact('shelters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required',
        'age' => 'required|integer',
        'gender' => 'required',
        'breed' => 'required',
        'size' => 'required',
        'weight' => 'nullable|numeric',
        'shelter_id' => 'required|exists:shelters,id',
        'photos.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'veterinary_info' => 'nullable|array',
        'temperament' => 'nullable|array',
        'energy_level' => 'nullable|array',
        'animal_relationship' => 'nullable|array',
    ]);

    $animal = Animal::create($validated);

    if ($request->hasFile('photos')) {
        foreach ($request->file('photos') as $photo) {
            $path = $photo->store('animal_photos', 'public');
            AnimalPhoto::create([
                'animal_id' => $animal->id,
                'photo_path' => $path,
            ]);
        }
    }

    // Processa Veterinary Info
    $veterinaryInfo = [];
    foreach (['rabies_vaccine', 'polyvalent_vaccine', 'giardia_vaccine', 'flu_vaccine', 'antiparasitic', 'neutered'] as $field) {
        $veterinaryInfo[$field] = $request->input("veterinary_info.$field") === 'on' ? 1 : 0;
    }
    $animal->veterinaryInfo()->create($veterinaryInfo);

    // Processa Temperaments
    $temperament = [];
    foreach (['calm', 'playful', 'protective', 'agressive'] as $field) {
        $temperament[$field] = $request->input("temperament.$field") === 'on' ? 1 : 0;
    }
    $animal->temperament()->create($temperament);

    // Processa Energy Levels
    $energyLevel = [];
    foreach (['high_energy', 'moderate_energy', 'low_energy'] as $field) {
        $energyLevel[$field] = $request->input("energy_level.$field") === 'on' ? 1 : 0;
    }
    $animal->energyLevel()->create($energyLevel);

    // Processa Animal Relationships
    $animalRelationship = [];
    foreach (['good_with_others', 'dominant_with_others', 'better_alone'] as $field) {
        $animalRelationship[$field] = $request->input("animal_relationship.$field") === 'on' ? 1 : 0;
    }
    $animal->animalRelationship()->create($animalRelationship);

    return redirect()->route('animals.index')->with('success', 'Animal cadastrado com sucesso!');
}



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $animal = Animal::with('photos', 'veterinaryInfo', 'temperament', 'energyLevel', 'animalRelationship')->findOrFail($id);
        $shelters = \App\Models\Shelter::all();
        return view('admin.animals.edit', compact('animal', 'shelters'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'name' => 'required',
        'age' => 'required|integer',
        'gender' => 'required',
        'breed' => 'required',
        'size' => 'required',
        'weight' => 'nullable|numeric',
        'shelter_id' => 'required|exists:shelters,id',
        'photos.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'veterinary_info' => 'nullable|array',
        'temperament' => 'nullable|array',
        'energy_level' => 'nullable|array',
        'animal_relationship' => 'nullable|array',
    ]);

    $animal = Animal::findOrFail($id);
    $animal->update($validated);

    if ($request->filled('delete_photos')) {
        $photosToDelete = AnimalPhoto::whereIn('id', $request->delete_photos)->get();
        foreach ($photosToDelete as $photo) {
            Storage::disk('public')->delete($photo->photo_path);
            $photo->delete();
        }
    }

    if ($request->hasFile('photos')) {
        foreach ($request->file('photos') as $photo) {
            $path = $photo->store('animal_photos', 'public');
            AnimalPhoto::create([
                'animal_id' => $animal->id,
                'photo_path' => $path,
            ]);
        }
    }

    // Atualiza Veterinary Info
    $veterinaryInfo = [];
    foreach (['rabies_vaccine', 'polyvalent_vaccine', 'giardia_vaccine', 'flu_vaccine', 'antiparasitic', 'neutered'] as $field) {
        $veterinaryInfo[$field] = $request->input("veterinary_info.$field") === 'on' ? 1 : 0;
    }
    $animal->veterinaryInfo()->updateOrCreate([], $veterinaryInfo);

    // Atualiza Temperaments
    $temperament = [];
    foreach (['calm', 'playful', 'protective', 'agressive'] as $field) {
        $temperament[$field] = $request->input("temperament.$field") === 'on' ? 1 : 0;
    }
    $animal->temperament()->updateOrCreate([], $temperament);

    // Atualiza Energy Levels
    $energyLevel = [];
    foreach (['high_energy', 'moderate_energy', 'low_energy'] as $field) {
        $energyLevel[$field] = $request->input("energy_level.$field") === 'on' ? 1 : 0;
    }
    $animal->energyLevel()->updateOrCreate([], $energyLevel);

    // Atualiza Animal Relationships
    $animalRelationship = [];
    foreach (['good_with_others', 'dominant_with_others', 'better_alone'] as $field) {
        $animalRelationship[$field] = $request->input("animal_relationship.$field") === 'on' ? 1 : 0;
    }
    $animal->animalRelationship()->updateOrCreate([], $animalRelationship);

    return redirect()->route('animals.index')->with('success', 'Animal atualizado com sucesso!');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $animal = Animal::findOrFail($id);

        // Apagar fotos associadas
        foreach ($animal->photos as $photo) {
            Storage::disk('public')->delete($photo->photo_path);
            $photo->delete();
        }

        $animal->delete();

        return redirect()->route('animals.index')->with('success', 'Animal excluído com sucesso!');
    }
}

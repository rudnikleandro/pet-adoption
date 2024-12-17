<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\AnimalPhoto;
use Illuminate\Support\Facades\Storage;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animals = Animal::with('shelter', 'photos')->get(); 
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
        'veterinary_info' => 'nullable|string',
        'shelter_id' => 'required|exists:shelters,id',
        'photos' => 'nullable|array',
        'photos.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
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

    return redirect()->route('animals.index')->with('success', 'Animal cadastrado com sucesso!');
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $animal = Animal::with('photos')->findOrFail($id);
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
        'veterinary_info' => 'nullable|string',
        'shelter_id' => 'required|exists:shelters,id',
        'photos' => 'nullable|array',
        'photos.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
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

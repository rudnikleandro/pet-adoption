<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animals = \App\Models\Animal::with('shelter')->get(); 
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
        $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'gender' => 'required',
            'breed' => 'required',
            'size' => 'required',
            'veterinary_info' => 'nullable|string',
            'shelter_id' => 'required|exists:shelters,id',
        ]);

        Animal::create($request->all());

        return redirect()->route('animals.index')->with('success', 'Animal cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $animal = Animal::findOrFail($id);
        return view('animals.show', compact('animal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $animal = \App\Models\Animal::findOrFail($id);
        $shelters = \App\Models\Shelter::all();
        return view('admin.animals.edit', compact('animal', 'shelters'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'gender' => 'required',
            'breed' => 'required',
            'size' => 'required',
            'veterinary_info' => 'nullable|string',
            'shelter_id' => 'required|exists:shelters,id' 
        ]);

        $animal = \App\Models\Animal::findOrFail($id);
        $animal->update($request->all());

        return redirect()->route('animals.index')->with('success', 'Animal excluído com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $animal = Animal::findOrFail($id);
        $animal->delete();

        return redirect()->route('animals.index')->with('success', 'Animal excluído com sucesso!');
    }
}

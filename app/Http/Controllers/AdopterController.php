<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adopter;
use App\Models\Animal;

class AdopterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adopters = Adopter::with('animal.shelter')->get();
        return view('admin.adopters.index', compact('adopters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $animals = Animal::with('shelter')->get();
        return view('admin.adopters.create', compact('animals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'animal_id' => 'required|exists:animals,id',
            'name' => 'required',
            'phone' => 'nullable',
            'email' => 'nullable|email',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'adoption_date' => 'required|date',
        ]);

        Adopter::create($request->all());

        return redirect()->route('adopters.index')->with('success', 'Adotante cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $adopter = Adopter::findOrFail($id);
        $animals = Animal::with('shelter')->get();
        return view('admin.adopters.edit', compact('adopter', 'animals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'animal_id' => 'required|exists:animals,id',
            'name' => 'required',
            'phone' => 'nullable',
            'email' => 'nullable|email',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'adoption_date' =>'required|date',
        ]);

        $adopter = Adopter::findOrFail($id);
        $adopter->update($request->all());

        return redirect()->route('adopters.index')->with('success', 'Adotante atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $adopter = Adopter::findOrFail($id);
        $adopter->delete();

        return redirect()->route('adopters.index')->with('success', 'Adotante excluído com sucesso!');
    }
}

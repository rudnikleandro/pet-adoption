<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shelter;

class ShelterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shelters = Shelter::all();
        return view('admin.shelters.index', compact('shelters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.shelters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'phone' => 'required',
            'responsible_name' => 'required',
        ]);

        Shelter::create($request->all());
        return redirect()->route('shelters.index')->with('success', 'Abrigo criado com sucesso!');
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
    public function edit(string $id)
    {
        $shelter = Shelter::findOrFail($id);
        return view('admin.shelters.edit', compact('shelter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shelter  $shelter)
    {
        $request->validate([
            'name' => 'required',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'phone' => 'required',
            'responsible_name' => 'required',
        ]);

        $shelter->update($request->all());
        return redirect()->route('shelters.index')->with('success', 'Abrigo atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shelter $shelter)
    {
        $shelter->delete();
        return redirect()->route('shelters.index')->with('success', 'Abrigo excluído com sucesso!');
    }
}

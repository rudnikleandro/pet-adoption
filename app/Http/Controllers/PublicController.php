<?php

namespace App\Http\Controllers;

use App\Models\Animal;

class PublicController extends Controller
{
    public function index()
    {
        $animals = Animal::whereDoesntHave('adopter')->with('shelter')->get();
        return view('public.index', compact('animals'));
    }

    public function show($id)
{
    $animal = Animal::with(['photos', 'shelter'])->findOrFail($id);
    return view('public.animals.show', compact('animal'));
}

}

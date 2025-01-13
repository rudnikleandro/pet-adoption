<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;


class PublicController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->only(['size', 'color', 'coat', 'age', 'sex', 'castrated', 'shelter']);
    
        $query = Animal::query()->with('photos');
    
        if (!empty($filters['size'])) {
            $query->where('size', $filters['size']);
        }
    
        if (!empty($filters['color'])) {
            $query->where('color', $filters['color']);
        }
    
        if (!empty($filters['coat'])) {
            $query->where('coat', $filters['coat']);
        }
    
        if (!empty($filters['age'])) {
            if ($filters['age'] === 'jovem') {
                $query->where('age', '<=', 2);
            } elseif ($filters['age'] === 'adulto') {
                $query->whereBetween('age', [3, 7]);
            } elseif ($filters['age'] === 'idoso') {
                $query->where('age', '>=', 7);
            }
        }
    
        if (!empty($filters['sex'])) {
            $query->where('sex', $filters['sex']);
        }
    
        if (!empty($filters['castrated'])) {
            $query->where('castrated', $filters['castrated'] === 'sim' ? true : false);
        }
    
        if (!empty($filters['shelter'])) {
            $query->where('shelter_id', $filters['shelter']);
        }
    
        $animals = $query->get();
    
        if ($request->ajax()) {
            return response()->json(['animals' => $animals]);
        }
            return view('public.index', compact('animals'));
    }
    
    public function show($id)
{
    $animal = Animal::with(['photos', 'shelter'])->findOrFail($id);
    return view('public.animals.show', compact('animal'));
}

}

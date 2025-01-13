<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Shelter;
use Illuminate\Http\Request;


class PublicController extends Controller
{
    public function index(Request $request)
{
    $filters = $request->only(['size', 'age', 'sex', 'shelter']);

    $query = Animal::query()->with('photos');

    if (!empty($filters['size'])) {
        $query->where('size', $filters['size']);
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
        $genderMapping = [
            'macho' => 'male',
            'femea' => 'female',
        ];
        $query->where('gender', $genderMapping[$filters['sex']] ?? $filters['sex']);
    }

    if (!empty($filters['shelter'])) {
        $query->where('shelter_id', $filters['shelter']);
    }

    $animals = $query->get();

    $shelters = Shelter::all();

    if ($request->ajax()) {
        return response()->json(['animals' => $animals]);
    }

    return view('public.index', compact('animals', 'shelters'));
}

}

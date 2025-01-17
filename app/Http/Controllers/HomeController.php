<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $animals = Animal::with('shelter', 'photos', 'veterinaryInfo', 'temperament', 'energyLevel', 'animalRelationship')
            ->whereDoesntHave('adopter')
            ->get();

        return view('home', compact('animals'));    }
}

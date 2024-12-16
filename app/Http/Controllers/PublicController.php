<?php

namespace App\Http\Controllers;

use App\Models\Animal;

class PublicController extends Controller
{
    /**
     * Exibe a lista de animais disponíveis para adoção.
     */
    public function index()
    {
        // Busca todos os animais que não possuem adotantes, incluindo informações sobre o abrigo.
        $animals = Animal::whereDoesntHave('adopter')->with('shelter')->get();

        // Retorna a view com os dados dos animais.
        return view('public.index', compact('animals'));
    }
}
